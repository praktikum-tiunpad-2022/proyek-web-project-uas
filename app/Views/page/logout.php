<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>

<?php
    session_start();
    session_destroy();
    echo '<script>window.location="/"</script>';
?>