<?php include '../admin/header.php'; 
if(isset($_POST) & !empty($_POST)){
}
?>
<div class="content pure-u-1 pure-u-md-21-24">
            <div class="header-small">

                <div class="items">
                    <h1 class="subhead">Profile</h1>
<!--
                    <aside class="pure-message message-success">
                        <p><strong>SUCCESS</strong>: Success message.</p>
                    </aside>
                    <aside class="pure-message message-error">
                        <p><strong>ERROR</strong>: Error message.</p>
                    </aside>
                    <aside class="pure-message message-warning">
                        <p><strong>WARNING</strong>: Warning message.</p>
                    </aside> -->
                    <form action="register_user.php" method="post" novalidate autocomplete="off" class="pure-form pure-form-stacked">
                        <fieldset>
                            <label for="firstname">First Name</label>
                            <input id="f_name" name="f_name" type="text" placeholder="First Name" class="pure-input-1" value="">

                            <label for="lastname">Last Name</label>
                            <input id="l_name" name="l_name" type="text" placeholder="Last Name" class="pure-input-1" value="">

                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" placeholder="Email" class="pure-input-1" value="" >
                           
                           <label for="email">NIC</label>
                            <input id="email" type="number" name="email" placeholder="Email" class="pure-input-1" value="" >
                            
                            <label for="email">Email</label>
                            <input id="nic" type="text" name="nic" placeholder="Email" class="pure-input-1" value="" >
                           
                            <label for="email">City</label>
                            <input id="city" type="text" name="city" placeholder="Email" class="pure-input-1" value="" >

                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" placeholder="Password" class="pure-input-1" value="">

                            <label for="role">Role</label>
                            <select id="role" name="role" class="pure-input-1">
                                <option value="1">Admin</option>
                                <option value="2">Customer</option>
                                <option value="3">Manager</option>
                            </select>

                            <!-- <input type="hidden" name="id" value="1"> -->
                            <button type="submit" class="pure-button button-success">Save</button>
                        </fieldset>
                    </form>
                </div>

                <div class="footer">
                    <div class="pure-menu pure-menu-horizontal">
                        <ul>
                            <li class="pure-menu-item"><a href="http://purecss.io/" class="pure-menu-link">PURE CSS</a></li>
                            <li class="pure-menu-item"><a href="http://fikiruretgeci.com" class="pure-menu-link">FIKIR URETGECI</a></li>
                            <li class="pure-menu-item"><a href="http://pure-themes.com" class="pure-menu-link">PURE THEMES</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
