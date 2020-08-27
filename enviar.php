  
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_POST && (array_key_exists("post", $_POST) && $_POST['post'] == '1')) {

    require 'phpMailer/src/PHPMailer.php';

    require_once 'init.php';
    $pdo = db_connect();
    envia_banco($pdo, $_POST['nome'], $_POST['email'], $_POST['telefone']);

    $email_remetente = $_POST['email'];

    //envio de e-mail para EMAIL
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setFrom("contato@dogmaniacs.com.br", $_POST['nome']); //remetente
    $mail->addReplyTo($email_remetente, $_POST['nome']); //responder o e-mail para
    $mail->addAddress("contato@dogmaniacs.com.br", "DogsManiacs"); //destinatário

    //Assunto do e-mail
    $mail->Subject = "Novo contato de " . $_POST['nome'];
    $mail->isHTML(true);
    $mail->Body = '<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta name="robots" content="noindex, follow" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="x-apple-disable-message-reformatting" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
        <title></title>
        <!--[if gte mso 9]>
            <style>
                .text_container{
                    /word-break: break-all;/ /thi will break all words in outlook/
                }
    
                .inner-row-table {
                    border: none;
                    width: 600px !important;
                }
    
                .newsletter-button-link, .text-element-td {
                    font-family: Arial, sans-serif;
                }
            </style>
        <![endif]-->
        <style type="text/css">
            body {
                margin: 0 !important;
                padding: 0 !important
            }
    
            p {
                margin: 0
            }
    
            table {
                border-collapse: collapse;
                min-height: 0 !important
            }
    
            td {
                border-collapse: collapse;
                white-space: -moz-pre-wrap !important;
                white-space: -webkit-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                white-space: pre-wrap;
                word-wrap: normal;
                word-break: normal;
                white-space: normal;
                border: none !important
            }
    
            .main-table,
            .newsletter-row {
                width: 100%
            }
    
            .component.text-component a {
                color: #337ab7;
                text-decoration: none
            }
    
            .component.text-component a:focus,
            .component.text-component a:hover {
                color: #23527c;
                text-decoration: underline;
                outline: 0
            }
    
            @media only screen and (max-width:640px) {
                body {
                    width: auto !important
                }
    
                table {
                    border-collapse: initial
                }
    
                .main-table,
                .newsletter-row {
                    width: auto
                }
    
                .newsletter-row .inner-row-table {
                    max-width: 600px;
                    width: 100% !important
                }
    
                .newsletter-row .inner-row-table {
                    table-layout: fixed
                }
    
                .slot {
                    width: 100% !important;
                    max-width: 100% !important;
                    display: block
                }
    
                .slot.ONE_FOURTH {
                    width: 50% !important;
                    max-width: 50% !important;
                    display: inline-block
                }
    
                .component .newsletter-button-link .button {
                    width: auto !important
                }
    
                .component .image {
                    mso-line-height-rule: exactly
                }
    
                .component,
                .image table {
                    width: 100% !important
                }
    
                .component .image img {
                    max-width: 100% !important
                }
    
                .slot.HALF .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .component .image img.not-resized {
                    width: 100% !important
                }
    
                .product-component img {
                    max-width: 100% !important
                }
    
                .slot.HALF .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .product-component img.not-resized {
                    width: 100% !important
                }
    
                .slot-spacing {
                    display: none
                }
    
                .slot .component .newsletter-main-content .image.article-image-container {
                    width: 33.3% !important
                }
    
                #bg_color_table {
                    width: 100%
                }
    
                .non-responsive .slot-spacing {
                    display: table-cell
                }
    
                .non-responsive .slot-spacing.CENTER {
                    display: table-cell
                }
    
                .non-responsive .slot {
                    display: table-cell
                }
    
                .non-responsive .slot.FULL {
                    width: auto !important;
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD {
                    width: auto !important;
                    max-width: 33.3% !important
                }
    
                .non-responsive .slot.HALF {
                    width: auto !important;
                    max-width: 50% !important
                }
    
                .non-responsive .slot.TWO_THIRDS {
                    width: 66.6% !important;
                    max-width: 66.6% !important
                }
    
                .non-responsive .slot.ONE_FOURTH {
                    width: auto !important;
                    max-width: 25% !important
                }
    
                .non-responsive .slot.FULL .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.FULL .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .text_container {
                    display: table-cell;
                    width: 530px
                }
    
                .fix-android-mail {
                    display: none
                }
    
                .row-table-body {
                    width: 100% !important
                }
            }
    
            @media only screen and (max-width:450px) {
                body {
                    width: auto !important
                }
    
                .main-table,
                .newsletter-row {
                    width: auto
                }
    
                table {
                    border-collapse: initial
                }
    
                .newsletter-row .inner-row-table {
                    max-width: 600px;
                    width: 100%
                }
    
                .newsletter-row .inner-row-table {
                    table-layout: fixed
                }
    
                .slot {
                    width: 100% !important;
                    max-width: 100% !important;
                    display: block
                }
    
                .slot.ONE_FOURTH {
                    width: 50% !important;
                    max-width: 50% !important;
                    display: inline-block
                }
    
                .component .newsletter-button-link .button {
                    width: auto !important
                }
    
                .component .image {
                    mso-line-height-rule: exactly
                }
    
                .component,
                .image table {
                    width: 100% !important
                }
    
                .component .image img {
                    max-width: 100% !important
                }
    
                .slot.HALF .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .component .image img.not-resized {
                    width: 100% !important
                }
    
                .product-component img {
                    max-width: 100% !important
                }
    
                .slot.HALF .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .product-component img.not-resized {
                    width: 100% !important
                }
    
                .slot-spacing {
                    display: none
                }
    
                .slot .component .newsletter-main-content .image.article-image-container {
                    width: 33.3% !important
                }
    
                #bg_color_table {
                    width: 100%
                }
    
                .non-responsive .slot-spacing {
                    display: table-cell
                }
    
                .non-responsive .slot-spacing.CENTER {
                    display: table-cell
                }
    
                .non-responsive .slot {
                    display: table-cell
                }
    
                .non-responsive .slot.FULL {
                    width: auto !important;
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD {
                    width: auto !important;
                    max-width: 33.3% !important
                }
    
                .non-responsive .slot.HALF {
                    width: auto !important;
                    max-width: 50% !important
                }
    
                .non-responsive .slot.TWO_THIRDS {
                    width: 66.6% !important;
                    max-width: 66.6% !important
                }
    
                .non-responsive .slot.ONE_FOURTH {
                    width: auto !important;
                    max-width: 25% !important
                }
    
                .non-responsive .slot.FULL .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.FULL .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .text_container {
                    display: table-cell;
                    width: 530px
                }
    
                .fix-android-mail {
                    display: none
                }
    
                .row-table-body {
                    width: 100% !important
                }
            }
        </style>
    </head>
    
    <body style="padding: 0px; margin: 0px; font-family: arial, sans-serif; background-repeat: no-repeat; background-size: auto; background-color: transparent;" border="0">
        <table align="center" class="wrapper-table" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="background-repeat: no-repeat; background-size: auto; background-color: transparent;">
            <tbody>
                <tr>
                    <td class="wrapper-td" valign="top" align="center" style="background-repeat: no-repeat; background-size: auto; background-color: transparent;">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" class="main-table" width="100%" data-border-width="1px" data-border-color="#000000" data-border-style="solid">
                            <tbody>
                                <tr>
                                    <td align="center" class="content">
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="c1ea1076-28ee-4253-96b9-4799f1e1da38" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  non-responsive" bgcolor="transparent">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="transparent" style="border-top: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-bottom: none; background-repeat: no-repeat; border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: transparent;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 1.3; font-size: 16px;">
                                                                                            <h1 style="text-align: center;"><strong>Novo Contato</strong></h1>
                                                                                            <p class="fix-android-mail" style="width: 580px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="f5294ce9-c367-4e2f-bf4c-20cb9ab2b085" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  non-responsive" bgcolor="transparent">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="transparent" style="border-top: none; border-left: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-bottom: none; background-repeat: no-repeat; border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: rgb(77, 153, 206);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 1.3; font-size: 16px;">
                                                                                            <p style="text-align: center; margin: 0px; padding: 0px;"><span style="color:#ffffff;"><strong>Novo contato de:</strong></span></p>
                                                                                            <p class="fix-android-mail" style="width: 580px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="HALF" data-row-id="5a64de31-4207-4eaf-a35c-3e9d1b73f9f8" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  non-responsive" bgcolor="transparent">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffffff" style="border-top: none; border-left: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-bottom: none; background-repeat: no-repeat; border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot HALF" data-structure-type="slot" data-slot-type="HALF" width="300" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 300px; width: 300px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="300" style="clear: both; background-color: rgb(255, 255, 255);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 1.3; font-size: 16px;">
                                                                                            <p style="margin: 0px; padding: 0px;"><strong>Nome: </strong>' . $_POST['nome'] . '<br /><strong>Email: </strong>' . $_POST['email'] . '</p>
                                                                                            <p class="fix-android-mail" style="width: 280px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="slot HALF" data-structure-type="slot" data-slot-type="HALF" width="300" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 300px; width: 300px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="300" style="clear: both; background-color: rgb(255, 255, 255);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 1.3; font-size: 16px;">
                                                                                            <p style="margin: 0px; padding: 0px;"><strong>Telefone: </strong>' . $_POST['telefone'] . '</p>
                                                                                            <p class="fix-android-mail" style="width: 280px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="69d4eb3b-0327-441b-9103-42598873c2be" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  non-responsive" bgcolor="transparent">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffffff" style="border-top: none; border-left: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-bottom: 1px solid rgb(0, 0, 0); background-repeat: no-repeat; border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: rgb(77, 153, 206);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; line-height: 1.3; font-size: 16px;">
                                                                                            <p style="text-align: center; margin: 0px; padding: 0px;">
                                                                                                <font color="#ffffff">DogManiacs</font>
                                                                                            </p>
                                                                                            <p class="fix-android-mail" style="width: 580px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    
    </html>';

    $mail2 = new PHPMailer(true);
    $mail2->CharSet = 'UTF-8';
    $mail2->setFrom("contato@dogmaniacs.com.br", $_POST['nome']); //remetente
    $mail2->addReplyTo("contato@dogmaniacs.com.br", "Dog Maniacs"); //responder o e-mail para
    $mail2->addAddress($email_remetente, $_POST['nome']); //destinatário



    $mail2->AddAttachment('apresentacao_dog_maniacs.pdf');
    $mail2->Subject = "Apresentação DogManiacs";
    $mail2->isHTML(true);
    $mail2->Body = '<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta name="robots" content="noindex, follow" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="x-apple-disable-message-reformatting" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
        <title>Newsletter</title>
        <!--[if gte mso 9]>
            <style>
                .text_container{
                    /*word-break: break-all;*/ /*thi will break all words in outlook*/
                }
    
                .inner-row-table {
                    border: none;
                    width: 600px !important;
                }
    
                .newsletter-button-link, .text-element-td {
                    font-family: Arial, sans-serif;
                }
            </style>
        <![endif]-->
        <style type="text/css">
            body {
                margin: 0 !important;
                padding: 0 !important
            }
    
            p {
                margin: 0
            }
    
            table {
                border-collapse: collapse;
                min-height: 0 !important
            }
    
            td {
                border-collapse: collapse;
                white-space: -moz-pre-wrap !important;
                white-space: -webkit-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                white-space: pre-wrap;
                word-wrap: normal;
                word-break: normal;
                white-space: normal;
                border: none !important
            }
    
            .main-table,
            .newsletter-row {
                width: 100%
            }
    
            .component.text-component a {
                color: #337ab7;
                text-decoration: none
            }
    
            .component.text-component a:focus,
            .component.text-component a:hover {
                color: #23527c;
                text-decoration: underline;
                outline: 0
            }
    
            @media only screen and (max-width:640px) {
                body {
                    width: auto !important
                }
    
                table {
                    border-collapse: initial
                }
    
                .main-table,
                .newsletter-row {
                    width: auto
                }
    
                .newsletter-row .inner-row-table {
                    max-width: 600px;
                    width: 100% !important
                }
    
                .newsletter-row .inner-row-table {
                    table-layout: fixed
                }
    
                .slot {
                    width: 100% !important;
                    max-width: 100% !important;
                    display: block
                }
    
                .slot.ONE_FOURTH {
                    width: 50% !important;
                    max-width: 50% !important;
                    display: inline-block
                }
    
                .component .newsletter-button-link .button {
                    width: auto !important
                }
    
                .component .image {
                    mso-line-height-rule: exactly
                }
    
                .component,
                .image table {
                    width: 100% !important
                }
    
                .component .image img {
                    max-width: 100% !important
                }
    
                .slot.HALF .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .component .image img.not-resized {
                    width: 100% !important;
                    max-width: 100% !important
                }
    
                .product-component img {
                    max-width: 100% !important
                }
    
                .slot.HALF .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .product-component img.not-resized {
                    width: 100% !important;
                    max-width: 100% !important
                }
    
                .slot-spacing {
                    display: none
                }
    
                .slot .component .newsletter-main-content .image.article-image-container {
                    width: 33.3% !important
                }
    
                #bg_color_table {
                    width: 100%
                }
    
                .non-responsive .slot-spacing {
                    display: table-cell
                }
    
                .non-responsive .slot-spacing.CENTER {
                    display: table-cell
                }
    
                .non-responsive .slot {
                    display: table-cell
                }
    
                .non-responsive .slot.FULL {
                    width: 100% !important;
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD {
                    width: 33.3% !important;
                    max-width: 33.3% !important
                }
    
                .non-responsive .slot.HALF {
                    width: 50% !important;
                    max-width: 50% !important
                }
    
                .non-responsive .slot.TWO_THIRDS {
                    width: 66.6% !important;
                    max-width: 66.6% !important
                }
    
                .non-responsive .slot.ONE_FOURTH {
                    width: 25% !important;
                    max-width: 25% !important
                }
    
                .non-responsive .slot.FULL .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.FULL .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .text_container {
                    display: table-cell;
                    width: 530px
                }
    
                .fix-android-mail {
                    display: none
                }
    
                .row-table-body {
                    width: 100% !important
                }
    
                .product-element-price {
                    width: 50% !important;
                    margin: 0 !important;
                    padding: 10px !important
                }
            }
    
            @media only screen and (max-width:450px) {
                body {
                    width: auto !important
                }
    
                .main-table,
                .newsletter-row {
                    width: auto
                }
    
                table {
                    border-collapse: initial
                }
    
                .newsletter-row .inner-row-table {
                    max-width: 600px;
                    width: 100%
                }
    
                .newsletter-row .inner-row-table {
                    table-layout: fixed
                }
    
                .slot {
                    width: 100% !important;
                    max-width: 100% !important;
                    display: block
                }
    
                .slot.ONE_FOURTH {
                    width: 50% !important;
                    max-width: 50% !important;
                    display: inline-block
                }
    
                .component .newsletter-button-link .button {
                    width: auto !important
                }
    
                .component .image {
                    mso-line-height-rule: exactly
                }
    
                .component,
                .image table {
                    width: 100% !important
                }
    
                .component .image img {
                    max-width: 100% !important
                }
    
                .slot.HALF .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .image img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .component .image img.not-resized {
                    width: 100% !important;
                    max-width: 100% !important
                }
    
                .product-component img {
                    max-width: 100% !important
                }
    
                .slot.HALF .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_THIRD .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .slot.ONE_FOURTH .product-component img.not-resized {
                    max-width: 100% !important;
                    width: 100% !important
                }
    
                .product-component img.not-resized {
                    width: 100% !important;
                    max-width: 100% !important
                }
    
                .slot-spacing {
                    display: none
                }
    
                .slot .component .newsletter-main-content .image.article-image-container {
                    width: 33.3% !important
                }
    
                #bg_color_table {
                    width: 100%
                }
    
                .non-responsive .slot-spacing {
                    display: table-cell
                }
    
                .non-responsive .slot-spacing.CENTER {
                    display: table-cell
                }
    
                .non-responsive .slot {
                    display: table-cell
                }
    
                .non-responsive .slot.FULL {
                    width: 100% !important;
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD {
                    width: 33.3% !important;
                    max-width: 33.3% !important
                }
    
                .non-responsive .slot.HALF {
                    width: 50% !important;
                    max-width: 50% !important
                }
    
                .non-responsive .slot.TWO_THIRDS {
                    width: 66.6% !important;
                    max-width: 66.6% !important
                }
    
                .non-responsive .slot.ONE_FOURTH {
                    width: 25% !important;
                    max-width: 25% !important
                }
    
                .non-responsive .slot.FULL .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .component .image img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.FULL .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_THIRD .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.TWO_THIRDS .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.ONE_FOURTH .product-component img {
                    max-width: 100% !important
                }
    
                .non-responsive .slot.HALF .text_container {
                    display: table-cell;
                    width: 530px
                }
    
                .fix-android-mail {
                    display: none
                }
    
                .row-table-body {
                    width: 100% !important
                }
    
                .product-element-price {
                    width: 50% !important;
                    margin: 0 !important;
                    padding: 10px !important
                }
            }
        </style>
    </head>
    
    <body style="padding: 0px; margin: 0px; font-family: arial, sans-serif; background-repeat: no-repeat; background-size: auto; background-color: rgb(59, 41, 75);" border="0">
        <table align="center" class="wrapper-table" width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="background-repeat: no-repeat; background-size: auto; background-color: rgb(59, 41, 75);">
            <tbody>
                <tr>
                    <td class="wrapper-td" valign="top" align="center" style="background-repeat: no-repeat; background-size: auto; background-color: rgb(59, 41, 75);">
                        <table border="0" cellspacing="0" cellpadding="0" align="center" class="main-table" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center" class="content">
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="9af2698f-0e12-5589-8580-38df6971907c" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  non-responsive" bgcolor="transparent">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffd100" style="border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot-spacing SIDE" width="20"></td>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="560" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 560px; width: 560px; overflow: visible;">
                                                                        <table class="component" data-component-type="spacer" cellspacing="0" cellpadding="0" width="560" align="top" style="background-color: transparent; clear: both; height: 40px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="40" style="height: 40px; font-size: 40px;">
                                                                                        <div style="display: none;"> </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="component" data-component-type="image" data-parent-slot-type="FULL" cellspacing="0" cellpadding="0" width="560" style="clear: both; background-color: transparent;">
                                                                            <tbody>
                                                                                <tr class="newsletter-main-content">
                                                                                    <td class="image image-container" align="center" style="line-height: 1px;"><img src="https://moosendimages.imgix.net/e15109e6-540e-f55d-6867-4ddb4ab0cc13/2d9031dad732488692e01aebcf815000httpsucarecdn.come016f3bb-f4dc-4d12-8687-5e8f077aa2f0?dpr=1&amp;fit=clip&amp;fm=png8&amp;ixjsv=2.2.4&amp;w=710" alt="Email Image" class="newsletter-image " width="355" height="auto" data-resize-width="355" data-resize-height="85" data-original-src="https://cdn.designer-images.net/e15109e6-540e-f55d-6867-4ddb4ab0cc13/2d9031dad732488692e01aebcf815000httpsucarecdn.come016f3bb-f4dc-4d12-8687-5e8f077aa2f0" align="bottom" style="border: 0px;" /></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="component" data-component-type="spacer" cellspacing="0" cellpadding="0" width="560" align="top" style="background-color: transparent; clear: both; height: 40px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="40" style="height: 40px; font-size: 40px;">
                                                                                        <div style="display: none;"> </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="slot-spacing SIDE" width="20"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="HALF" data-row-id="93294f80-ee06-5609-ba6b-cab3e41ab07f" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  " bgcolor="transparent">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffd100" style="border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot-spacing SIDE" width="20"></td>
                                                                    <td class="slot HALF" data-structure-type="slot" data-slot-type="HALF" width="280" cellpadding="0" cellspacing="0" align="left" valign="bottom" style="font-weight: normal; max-width: 280px; width: 280px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="280" style="clear: both; background-color: transparent;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 0px; overflow-wrap: break-word; word-break: break-word; background-color:#FFF">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial; line-height: 1; font-size: 16px;">
                                                                                            <h2 style="margin: 0px; padding: 0px;"><strong>Olá '.$_POST['nome'].', eu sou Aline Dias, fundadora da Dogmaniacs e inicialmente gostaria de agradecer pelo seu contato.</strong></h2>
                                                                                            <p class="fix-android-mail" style="width: 280px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="component" data-component-type="spacer" cellspacing="0" cellpadding="0" width="280" align="top" style="background-color: #fff; clear: both; height: 5px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="5" style="height: 5px; font-size: 5px;">
                                                                                        <div style="display: none;"> </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="component" data-component-type="spacer" cellspacing="0" cellpadding="0" width="280" align="top" style="background-color: #fff; clear: both; height: 5px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="5" style="height: 5px; font-size: 5px;">
                                                                                        <div style="display: none;"> </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="slot HALF" data-structure-type="slot" data-slot-type="HALF" width="280" cellpadding="0" cellspacing="0" align="left" valign="bottom" style="font-weight: normal; max-width: 280px; width: 280px; overflow: visible;">
                                                                        <table class="component" data-component-type="image" data-parent-slot-type="HALF" cellspacing="0" cellpadding="0" width="280" style="clear: both; background-color: #fff;">
                                                                            <tbody>
                                                                                <tr class="newsletter-main-content">
                                                                                    <td class="image image-container" align="center" style="line-height: 1px;"><img src="https://moosendimages.imgix.net/e15109e6-540e-f55d-6867-4ddb4ab0cc13/1f49b682545d44febc14f46f699f1b39httpsucarecdn.com43d3785d-4383-4869-be64-3623d3edc839?dpr=1&amp;fit=clip&amp;fm=png8&amp;ixjsv=2.2.4&amp;w=560" alt="Email Image" class="newsletter-image not-resized" width="280" height="auto" data-resize-width="0" data-resize-height="0" data-original-src="https://cdn.designer-images.net/e15109e6-540e-f55d-6867-4ddb4ab0cc13/1f49b682545d44febc14f46f699f1b39httpsucarecdn.com43d3785d-4383-4869-be64-3623d3edc839" align="bottom" style="border: 0px;" /></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="slot-spacing SIDE" width="20"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="87774408-2923-51b9-b0df-19bf1d289521" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="transparent" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  " bgcolor="#fff">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffffff" style="border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component" data-component-type="spacer" cellspacing="0" cellpadding="0" width="600" align="top" style="background-color: transparent; clear: both; height: 30px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="30" style="height: 30px; font-size: 30px;">
                                                                                        <div style="display: none;"> </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: transparent;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 25px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial; line-height: 1; font-size: 16px;">
                                                                                            <p style="margin: 0px; padding: 0px; text-align: center;">Sinto orgulho em poder dividir com você um modelo de negócio dos mais rentáveis dentro do segmento de franquias. Em breve, um de nossos consultores entrará em contato com você.</p>
                                                                                            <p class="fix-android-mail" style="width: 550px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="6b4c9f1f-a891-535a-9376-c5cab452da37" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="#fff" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  " bgcolor="#fff">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffffff" style="border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: #fff;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial; line-height: 1; font-size: 16px;">
                                                                                            <p style="text-align: center; margin: 0px; padding: 0px;">ass:</p>
                                                                                            <p class="fix-android-mail" style="width: 580px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="ec7142b6-ea7f-5d8e-911d-cbc50e526a6a" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="#fff" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  " bgcolor="#fff">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffffff" style="border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component" data-component-type="image" data-parent-slot-type="FULL" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: #fff;">
                                                                            <tbody>
                                                                                <tr class="newsletter-main-content">
                                                                                    <td class="image image-container" align="center" style="line-height: 1px;"><img src="https://moosendimages.imgix.net/e15109e6-540e-f55d-6867-4ddb4ab0cc13/50704c10e76f4411be90f1af33a9e94ahttpsucarecdn.com1f9c566a-2653-43c2-98ec-d077666bf950?dpr=1&amp;fit=clip&amp;ixjsv=2.2.4&amp;w=326" alt="Email Image" class="newsletter-image " width="163" height="auto" data-resize-width="163" data-resize-height="143" data-original-src="https://cdn.designer-images.net/e15109e6-540e-f55d-6867-4ddb4ab0cc13/50704c10e76f4411be90f1af33a9e94ahttpsucarecdn.com1f9c566a-2653-43c2-98ec-d077666bf950" align="bottom" style="border: 0px;" /></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table class="component text-component" data-component-type="text" cellspacing="0" cellpadding="0" width="600" style="clear: both; background-color: #fff;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="element-td text-element-td" style="padding: 10px; overflow-wrap: break-word; word-break: break-word;">
                                                                                        <div class="text_container newsletter-main-content" style="color: rgb(0, 0, 0); font-family: Arial; line-height: 1; font-size: 16px;">
                                                                                            <p style="text-align: center; margin: 0px; padding: 0px;">Aline Dias</p>
                                                                                            <p class="fix-android-mail" style="width: 580px; margin: 0px; padding: 0px;"></p>
                                                                                        </div>
                                                                                        <div>
                                                                                            <!--[if gte mso 15]><div style="display: "none"; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                        </div>
                                                                                        <!--[if gte mso 15]><div style="display: none; font-size: 1px; line-height: 1px;">&nbsp;</div><![endif]-->
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table data-structure-type="row" data-row-type="FULL" data-row-id="8bf6b16e-b147-5cce-8485-1ecc8a57e618" data-row-behavior="NORMAL" data-row-repeat-count="5" data-row-sort-products="Orders" data-row-background-color-wide="#fff" cellpadding="0" cellspacing="0" width="100%" class="newsletter-row  " bgcolor="#fff">
                                            <tbody>
                                                <tr>
                                                    <td class="row-td" align="center">
                                                        <table class="inner-row-table" cellpadding="0" cellspacing="0" width="600" valign="top" bgcolor="#ffffff" style="border-radius: 0px;">
                                                            <tbody class="row-table-body" style="display: table; width: 600px;">
                                                                <tr>
                                                                    <td class="slot FULL" data-structure-type="slot" data-slot-type="FULL" width="600" cellpadding="0" cellspacing="0" align="left" valign="top" style="font-weight: normal; max-width: 600px; width: 600px; overflow: visible;">
                                                                        <table class="component" data-component-type="spacer" cellspacing="0" cellpadding="0" width="600" align="top" style="background-color: #fff; clear: both; height: 30px;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="30" style="height: 30px; font-size: 30px;">
                                                                                        <div style="display: none;"> </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
    
    </html>';

    $res = $mail->send();

    $res2 = $mail2->send();
    //Verifica se houve algum erro no envio de e-mails
    if (!$res || !$res2) {
        echo "0";
    } else {
        echo "1";
    }
    exit;
}
?>