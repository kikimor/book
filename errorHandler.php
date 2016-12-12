<?php
set_error_handler(function($errorNum, $errorText) {
    throw new ErrorException($errorText);
}, E_ALL);
