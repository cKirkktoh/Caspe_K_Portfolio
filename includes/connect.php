<?php
$dsn = "mysql:host=localhost;dbname=sbnqmg2q_portfolio_k;charset=utf8mb4";
try {
$connection = new PDO($dsn, 'sbnqmg2q_general', 'GwAAhKSnpuCFq47');
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('unable to connect');
}
?>