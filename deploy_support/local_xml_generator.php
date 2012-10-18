<?php
// start app/etc/local.xml
$xml = new XmlWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->setIndentString("  ");
$xml->startDocument('1.0');
$xml->startElement('config');
  $xml->startElement('global');
    $xml->startElement('install');
      $xml->startElement('date');
        $xml->writeCData(date('r'));
      $xml->endElement(); //date
    $xml->endElement(); //install

    $xml->startElement('crypt');
      $xml->startElement('key');
        $xml->writeCData($_SERVER['MAGE_KEY']);
      $xml->endElement(); //key
    $xml->endElement(); //crypt

    $xml->startElement('disable_local_modules');
      $xml->writeCData('false');
    $xml->endElement(); // disable_local_modules

    $xml->startElement('resources');
      $xml->startElement('db');
        $xml->startElement('table_prefix');
          $xml->writeCData($_SERVER['DB_PREFIX']);
        $xml->endElement(); // table_prefix
      $xml->endElement(); // db

      $xml->startElement('default_setup');
        $xml->startElement('connection');
          $xml->startElement('host');
            $xml->writeCData($_SERVER['DB1_HOST']);
          $xml->endElement(); // host
          $xml->startElement('username');
            $xml->writeCData($_SERVER['DB1_USER']);
          $xml->endElement(); // username
          $xml->startElement('password');
            $xml->writeCData($_SERVER['DB1_PASS']);
          $xml->endElement(); // password
          $xml->startElement('dbname');
            $xml->writeCData($_SERVER['DB1_NAME']);
          $xml->endElement(); // dbname
          $xml->startElement('initStatements');
            $xml->writeCData('SET NAMES utf8');
          $xml->endElement(); // initStatements
          $xml->startElement('model');
            $xml->writeCData('mysql4');
          $xml->endElement(); // model
          $xml->startElement('type');
            $xml->writeCData('pdo_mysql');
          $xml->endElement(); // type
          $xml->startElement('pdoType');
            $xml->writeCData('');
          $xml->endElement(); // pdoType
          $xml->startElement('active');
            $xml->writeCData('1');
          $xml->endElement(); // active
        $xml->endElement(); // connection
      $xml->endElement(); // default_setup
    $xml->endElement(); // resources

    $xml->startElement('session_save');
      $xml->writeCData('db');
    $xml->endElement(); // session_save
  $xml->endElement(); // global

  $xml->startElement('default');
    $xml->startElement('web');
      $xml->startElement('seo');
        $xml->startElement('use_rewrites');
          $xml->writeCData('0');
        $xml->endElement(); //use_rewrites
      $xml->endElement(); //seo
  $xml->endElement(); //default

  $xml->startElement('admin');
    $xml->startElement('routers');
      $xml->startElement('adminhtml');
        $xml->startElement('args');
          $xml->startElement('frontname');
            $xml->writeCData('admin');
          $xml->endElement(); //frontname
        $xml->endElement(); //args
      $xml->endElement(); //adminhtml
    $xml->endElement(); //routers
  $xml->endElement(); //admin
$xml->endElement(); //config

$handle = fopen(__DIR__ . '/../app/etc/local.xml', 'w');
fwrite($handle, $xml->outputMemory(true));
// end app/etc/local.xml

// start errors/local.xml
$errors_xml = new XmlWriter();
$errors_xml->openMemory();
$errors_xml->setIndent(true);
$errors_xml->setIndentString("  ");
$errors_xml->startDocument('1.0');
$errors_xml->startElement('config');
  $errors_xml->startElement('skin');
    $errors_xml->writeCData('default');
  $errors_xml->endElement(); // skin
  $errors_xml->startElement('report');
      $errors_xml->startElement('action');
        $errors_xml->writeCData('print'); // "print" to show exception on screen and "email" to send exception on via email
      $errors_xml->endElement(); // action
      $errors_xml->startElement('subject');
        $errors_xml->writeCData('magento debug info'); // subject of email
      $errors_xml->endElement(); // subject
      $errors_xml->startElement('email_address');
        $errors_xml->writeCData(''); // email address to send to
      $errors_xml->endElement(); // email_address
      $errors_xml->startElement('trash');
        $errors_xml->writeCData('leave'); // "leave" store on disk, "delete" for cleaning
      $errors_xml->endElement(); // trash
  $errors_xml->endElement(); // report
$errors_xml->endElement(); //config

$handle = fopen(__DIR__ . '/../errors/local.xml', 'w');
fwrite($handle, $errors_xml->outputMemory(true));
// end errors/local.xml