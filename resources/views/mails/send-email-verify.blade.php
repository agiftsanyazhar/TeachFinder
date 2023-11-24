<!DOCTYPE html>
<html lang="en" xmlns="https://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
      <noscript>
        <xml>
          <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
      </noscript>
    <![endif]-->
  <style>
    table,
    td,
    div,
    h1,
    p {
      font-family:Inter, sans-serif; 
    }
  </style>
</head>

<body style="margin:0; padding:0; background:#fff5d2; ">
  <table role="presentation" style="width:100%; border-collapse:collapse; border:0; border-spacing:0; ">
    <tr>
      <td align="center" style="padding:0; ">
        <table role="presentation" style="width:100%; border-collapse:collapse; border-spacing:0; ">
          <tr>
            <td style="padding:100px; ">
              <table role="presentation" style="width:100%; border-collapse:collapse; border:0; border-spacing:0; ">
                <tr>
                  <td style="padding:0; background:#fff; ">
                    <table role="presentation" style="width:100%; border-collapse:collapse; border:0; border-spacing:0; ">
                      <tr>
                        <td style="padding:20px 40px; ">
                          <p style="margin:0; font-size:18px; font-family:Inter,sans-serif; color:#212529; font-style:normal; font-weight:600; ">Halo {{ $name }},</p>

                          <p style="margin:30px 0 0 0; font-size:16px; font-family:Inter,sans-serif; color:#212529; font-style:normal; font-weight:500; ">
                            Silakan verifikasi akun Anda terlebih dahulu.
                          </p>

                          <table role="presentation" style="margin:20px 0; width:100%; border-collapse:collapse; border:0; border-spacing:0; ">
                            <tr>
                              <td align="center" style="padding:0; ">
                                <table role="presentation" style="width:auto; border-collapse:collapse; border:0; border-spacing:0; ">
                                  <tr>
                                    <td align="center" style="background:#1B8BAE; border-radius:8px; padding:0; ">
                                      <form action="{{ route('send-email-verify', $token) }}" method="post">
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <button type="submit" style="background:#1B8BAE; border:none; font-size:14px; margin:18px 12px; line-height:0; font-family:Ubuntu,sans-serif; color:#ffffff; font-style:normal; font-weight:500; ">
                                          Verifikasi
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>

                          <p style="margin:30px 0 0 0; font-size:16px; font-family:Inter,sans-serif; color:#212529; font-style:bold; font-weight:500; ">
                            Verifikasi ini akan kedalawuarsa dalam 60 menit.
                          </p>
                          <p style="margin:50px 0 0 0; font-size:16px; font-family:Inter,sans-serif; color:#212529; font-style:bold; font-weight:500; ">Salam,<br>TeachFinder</p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0; ">
                    <table role="presentation" style="width:100%; border-collapse:collapse; border:0; border-spacing:0; ">
                      <tr>
                        <td style="padding:0; ">
                          <table align="center" role="presentation" style="border-collapse:collapse; border:0; border-spacing:0; ">
                            <tr>
                              <td align="center" style="padding:0; width:auto; ">
                                <p style="margin:100px 0 0 0;  font-size:14px; font-family:Inter,sans-serif; color:#012970; font-style:normal; ">&copy;  Copyright <b>{{ date('Y') }} TeachFinder</b>. All Rights Reserved</p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>