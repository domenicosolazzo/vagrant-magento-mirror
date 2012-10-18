name "vagrant-lamp"
description "A LAMP enviroment for Vagrant."

run_list "recipe[vagrant_magento]"
override_attributes "mysql" => { "server_root_password" => "root", "allow_remote_root" => true }