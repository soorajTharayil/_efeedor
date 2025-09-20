<?php
$full_domain = $_SERVER['HTTP_HOST'];

// Extract subdomain (assuming format: subdomain.domain.com)
$parts = explode('.', $full_domain);

$subdomain = $parts[0]; // First part before the first dot

// Define configurations for different subdomains
$configurations = [
    'saasdev1' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://saasdev1.efeedor.com/",
        "DOMAIN" => "saasdev1.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_saasdev1",
        "DOMAIN_NAME"=>"saasdev1",
    ],
     'shmcwc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://shmcwc.efeedor.com/",
        "DOMAIN" => "shmcwc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_shmcwc",
        "DOMAIN_NAME"=>"shmcwc",
    ],
    'trustinwc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://trustinwc.efeedor.com/",
        "DOMAIN" => "trustinwc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_trustinwc",
        "DOMAIN_NAME"=>"trustinwc",
    ],
    'pdhindujawc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://pdhindujawc.efeedor.com/",
        "DOMAIN" => "pdhindujawc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_pdhindujawc",
        "DOMAIN_NAME"=>"pdhindujawc",
    ],
    'almaswc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://almaswc.efeedor.com/",
        "DOMAIN" => "almaswc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_almaswc",
        "DOMAIN_NAME"=>"almaswc",
    ],
    'kusumawc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://kusumawc.efeedor.com/",
        "DOMAIN" => "kusumawc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_kusumawc",
        "DOMAIN_NAME"=>"kusumawc",
    ],
    'unityhospitalwc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://unityhospitalwc.efeedor.com/",
        "DOMAIN" => "unityhospitalwc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_unityhospitalwc",
        "DOMAIN_NAME"=>"unityhospitalwc",
    ],
    'unitedhospitalwc' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "https://unitedhospitalwc.efeedor.com/",
        "DOMAIN" => "unitedhospitalwc.efeedor.com",
        "DBUSER" => "cpefeedor_efeedor",
        "DBPASSWORD" => "Efeedor#@100%%",
        "DBNAME" => "cpefeedor_unitedhospitalwc",
        "DOMAIN_NAME"=>"unitedhospitalwc",
    ],
    // Add more instances here...

    'default' => [
        "DBHOST" => "localhost",
        "BASE_URL" => "http://localhost/",
        "DOMAIN" => "localhost",
        "DBUSER" => "root",
        "DBPASSWORD" => "",
        "DBNAME" => "efeedor",
        "DOMAIN_NAME"=>"default",
    ],
];

// Use the appropriate configuration
$config_set = $configurations[$subdomain] ?? $configurations['default'];


