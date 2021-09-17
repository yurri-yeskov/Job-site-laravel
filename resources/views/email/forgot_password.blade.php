<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>

<body
    style="width:100%; margin:0; padding:0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#ffffff;font-family: Times New Roman, Times, serif;font-size:0;">
    <table cellpadding="0" cellspacing="0" border="0" id="backgroundTable"
        style="height:auto !important; margin:0; padding:0; width:100% !important; background-color:#FFF;color:#222222; font-size:14px; line-height:19px; margin-top:0; padding:0; font-weight:normal;">
        <tr>
            <td align="center">
                <table id="contenttable" width="600" align="center" cellpadding="0" cellspacing="0" border="0"
                    style="border:none; width: 100% !important; max-width:600px !important;border-top:8px solid #FFF">
                    <tr>
                        <td align="center">
                            <div style="width: 250px;">
                                <!-- <img src="' . DEFAULT_URL . 'images/email-logo.png?v='.time().'" width="100%" height="100%"/> -->
                                <h2>{{ config('app.name', 'Laravel') }}</h2>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div id="tablewrap"
                    style="width:100% !important; max-width:600px !important; text-align:center; margin:0 auto;">
                    <table id="contenttable" width="600" align="center" cellpadding="0" cellspacing="0" border="0"
                        style="font-family: Times New Roman, Times, serif;background-color:#FFFFFF; margin:0 auto; text-align:center; border:none; width: 100% !important; max-width:600px !important;border-top:8px solid #FFF">

                        <tr>

                            <td width="100%">
                                <table bgcolor="#FFF" border="0" cellspacing="0" cellpadding="20" width="100%">
                                    <tr>
                                        <td width="100%" bgcolor="#FFF" style="text-align:left;">
                                            Hi {{ $username }},<br><br>
                                            Someone (Hopefully you) requested a new password for your account.<br><br>
                                            Please click on the below link to get a new password.<br><br>
                                            <a style="font-weight:bold; text-decoration:none;" href="{{ $url}}"
                                                target="_blank">
                                                <div
                                                    style="display:block; max-width:100% !important; width:auto !important;margin:auto; height:auto !important;background-color:#0e62a4;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;border-radius:10px;color:#ffffff;font-size:16px;text-align:center">
                                                    Reset Password</div>
                                            </a><br />
                                        </td>
                                    </tr>
                                </table>

                                <table bgcolor="#F0F0F0" border="0" cellspacing="0" cellpadding="10" width="100%"
                                    style="border-top:2px solid #F0F0F0;margin-top:10px;border-bottom:3px solid #FFF">
                                    <tr>
                                        <td width="100%" bgcolor="#ffffff" style="text-align:center;">
                                            <p
                                                style="color:#222222; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:14px; margin-top:0; padding:0; font-weight:normal;padding-top:5px;">
                                                <!-- ##FOOTER## -->
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>