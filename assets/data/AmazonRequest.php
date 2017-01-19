<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 19/01/2017
 * Time: 09:54
 */
require('AmazonECS.class.php');
const Aws_ID = "AKIAIGAWZDBK7XI7UWPQ"; // Identifiant
const Aws_SECRET = "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"; //Secret
const associateTag="classicarium-21"; // AssociateTag
$client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);

