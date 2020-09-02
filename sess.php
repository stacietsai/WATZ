<?php
session_start();

echo htmlentities(json_encode( $_SESSION ));

