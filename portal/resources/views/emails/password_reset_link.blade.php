<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#1c1c1c; color:#e0e0e0; font-family:Arial, sans-serif; padding:20px;">
    <tr>
        <td>
            <img src="https://rsc.vet/img/logo.png" alt="OpenRSC Logo"
            style="display:block; margin-bottom:20px; width:200px; height:auto;">
            <h2 style="color:#6be585;">OpenRSC ({{ \App\Helpers\uc_worlds($db)  }}) Password Reset Request</h2>

            <p style="margin-bottom:16px;">You requested a password reset for your account:
                <strong>{{ $username }}</strong> on world: <strong>{{ App\Helpers\uc_worlds($db) }}</strong>.
            </p>

            <p style="margin-bottom:16px;">
                <a href="{{ $url }}"
                   style="background-color:#6be585; color:#000; text-decoration:none; padding:10px 16px; border-radius:4px; display:inline-block;">
                    Click here to reset your password
                </a>
            </p>

            <p style="margin-bottom:16px;">
                If the button above doesn't work, you can reset your password by copying and pasting this link into your browser:
                <a href="{{ $url }}" style="color:#6be585;">{{ $url }}</a>
            </p>

            <p style="margin-bottom:16px;">This code will expire in <strong>1 hour</strong>.</p>

            <p style="margin-bottom:16px;">Do not share this email or the password reset link within it with anyone.</p>

            <p style="margin-bottom:16px;">
                Do not reply to this email. For help, please register a forum account and post on our forums:
                <a href="https://rsc.vet/board/viewforum.php?f=27"
                   style="color:#6be585; text-decoration:underline;" target="_blank" rel="noopener noreferrer">
                    Support Forum
                </a>
            </p>
        </td>
    </tr>
</table>
