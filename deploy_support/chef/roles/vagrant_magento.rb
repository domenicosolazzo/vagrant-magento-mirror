name "vagrant_magento"
description "A LAMP enviroment for Magento."

run_list "recipe[vagrant_magento]"
override_attributes "mysql" => { "server_root_password" => "root", "allow_remote_root" => true }