name "vagrant_magento"
description "A LAMP enviroment for Magento."

run_list "recipe[vagrant_magento]"
override_attributes "mysql" => { 
  "server_root_password" => "root",
  "allow_remote_root" => true,
  "tunable" => {
    "key_buffer" => "64M",
    "innodb_buffer_pool_size" => "32M"
  }
}