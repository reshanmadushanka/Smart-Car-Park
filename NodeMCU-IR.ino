#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Servo.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#define SCREEN_WIDTH 128 // OLED display width, in pixels
#define SCREEN_HEIGHT 64 // OLED display height, in pixels

// Declaration for an SSD1306 display connected to I2C (SDA, SCL pins)
Adafruit_SSD1306 display(-1);

//defines Wifi login detail
const char* ssid = "SLT-4G_B7666";
const char* password = "uma@usjp2016";
int wifiStatus;
WiFiServer server(80);

//defines digital pins to read sensor inputs
const int OLED_SCL = 5;       //D1 OLED Display Serial Clock Pin
const int OLED_SDA = 4;       //D2 OLED Display Serial Data Pin
const int sensor1input = 16;  //D0 Slot01 sensor
const int sensor2input = 0;   //D3 Slot02 sensor
const int sensor3input = 2;   //D4 Slot03 sensor
const int sensor4input = 14;  //D5 Slot04 sensor
const int sensor5input = 12;  //D6 GateOut sensor
const int servo1 = 13;        //D7 GateOut servo motor
const int sensor6input = 15;  //D8 GateIn sensor

//defines servo motor
Servo servoIn;
//define default servo arm angle
int servoangle = 50;

void setup() {
  
  //starts the serial communication
  Serial.begin(115200); 
  
  //define servo input
  servoIn.attach(servo1);

  //initialize the OLED display and the OLED address 0X3C
  display.begin(SSD1306_SWITCHCAPVCC, 0x3C); 
  delay(2000);
  display.clearDisplay();
  //set font size, color and cursor(x,y)
  display.setTextSize(1);
  display.setTextColor(WHITE);
  display.setCursor(0, 1);
  // Display static text
  display.println("Welcome");
  display.println("Smart Car Park");
  display.display(); 
         
  //sets as an Input Pin to get sensor data
  pinMode(sensor1input, INPUT);     
  pinMode(sensor2input, INPUT);    
  pinMode(sensor3input, INPUT);    
  pinMode(sensor4input, INPUT); 
  pinMode(sensor5input, INPUT);  
  pinMode(sensor6input, INPUT);     
   

  //ESP8266 - WiFi Connection
  WiFi.begin(ssid, password);
   while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.println("Can;t connect to WiFi ");
  }
  //starts the Server
  server.begin();  

}

void loop() { 
  
  //define HTTPClient
  HTTPClient http;

  // Scroll in various directions, pausing in-between:
  display.startscrollleft(0x00, 0x0F);
  delay(2000); 

  //get Sensor Reading inputs
  int sensor1 = digitalRead(sensor1input);
  int sensor2 = digitalRead(sensor2input);
  int sensor3 = digitalRead(sensor3input);
  int sensor4 = digitalRead(sensor4input);
  int sensor5 = digitalRead(sensor5input);
  int sensor6 = digitalRead(sensor6input);

  //print sesor digital inputs in serial monitor
  Serial.print(sensor1);
  Serial.print("\t"); 
  Serial.print(sensor2);
  Serial.print("\t"); 
  Serial.print(sensor3);
  Serial.print("\t"); 
  Serial.print(sensor4);
  Serial.print("\t"); 
  Serial.print(sensor5);
  Serial.print("\t"); 
  Serial.print(sensor6);
  Serial.print("\t");
  Serial.println(""); 

  //define gate operation
  if((sensor5 == 0)||(sensor6 == 0)){
          for (servoangle = 50; servoangle < 140; servoangle += 1){
          servoIn.write(servoangle);
          delay(50); 
          } 
          for (servoangle = 140; servoangle >= 50; servoangle -= 1){
          servoIn.write(servoangle);
          delay(50); 
          } 
  }
    
  //check the current Wifi connection status
  if ((WiFi.status() == WL_CONNECTED)) { 
    
  String slot1, slot2, slot3, slot4, postData;
  //get sensors readings as string
  slot1 = String(sensor1); 
  slot2 = String(sensor2);
  slot3 = String(sensor3);
  slot4 = String(sensor4);
   
  //pass Data to web application
  postData = "s1_status=" + slot1 + "&s2_status=" + slot2 + "&s3_status=" + slot3 + "&s4_status=" + slot4 ;

  http.begin("http://192.168.1.10/smart_car_park/data.php");              //specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //specify content-type header
  http.POST(postData);                                                    //send the request to web app
  //http.getString();                                                     //get the response from web app
 Serial.println(http.getString());
 } 
 else {
    Serial.println("Error on HTTP request");
    } 
    http.end(); //Free the resources
    delay(1000);
 }
