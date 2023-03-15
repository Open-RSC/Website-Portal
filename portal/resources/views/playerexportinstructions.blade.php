@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">How to use Open RSC player exports!</h2>

        <h2>To export</h2>
        <p>Player accounts may be exported from <a href="/playerexport">https://rsc.vet/playerexport</a>. You will need to know the username and password for the account being exported. Banned accounts may be exported as well.</p>
        <p>The page looks like this:</p>
        <img src="/img/player.export.page.png"/>
        
        <h2>For single-player, or with your friends</h2>
        <p>For single-player, you will want to use the <strong><code>playerdata.db</code></strong> file. This is a fully contained sqlite database file compatible with the Open RSC server. Information on how to run an Open RSC server is not covered here, but suffice to say that once the server is pointed correctly at this file, and your client is pointed correctly at your server, you will be able to log in to your account as normal, with all account data intact. If you were banned or muted previously, you are unbanned and unmuted in your player export.</p>
        <p>For a locally hosted server with multiple characters, you will need to merge the player exports together by importing multiple player's exports <code>playerdata.sql</code> files into a single database. The SQL inside those files is compatible with both MariaDB and SQLite. I recommend using the program HeidiSQL for manipulating SQL databases.</p>
        
        <h2>For import into a foreign server</h2>
        <h3>Disclaimer</h3>
        <p><strong>The <code>data.zip.gpg</code> file is not necessary to use unless you are a server administrator importing data from lots of people you do not necessarily trust. If you are not a foreign server administrator, you should still keep this file in case you might ever want to give it to someone who is one!</strong></p>
        
        <h3>Introduction</h3>
        <p>Open RSC player exports include a GPG signed zip archive of the <code>metadata.txt</code>, <code>playerdata.db</code>, and <code>playerdata.sql</code> files, in a file which is always called <code>data.zip.gpg</code></p>
        <p>By using GPG, you can verify that the account data has not been altered since it was exported from Open RSC.</p>
        
        <h3>How to extract</h3>
        <ol>
            <li>First, you will need the public key associated with the private key that Open RSC used to sign the data. A link to this file is included in <code>metadata.txt</code>.</li>
            <li>Ensure that you trust the GPG Link looks like it belongs to Open RSC. We have used https://rsc.vet and https://openrsc.com at the time of this writing.</li>
            <li>Download the key.</li>
            <li>On a linux system, the command used to import a gpg public key is: <code>gpg --import ./openrsc-gpg-public-key-2023-02-16.key</code></li>
            <li>You will want to inform GPG how much you trust that data signed with the private key associated with that public key comes from Open RSC.</li>
            <li>Use <code>gpg --list-keys</code> to see the user-id of the imported key. Currently it is <code>422EF5A2134ED3DCCE5D48522E3225A88AD92DF1</code></li>
            <li>Replacing the user-id with whatever is most current, use <code>gpg --edit-key 422EF5A2134ED3DCCE5D48522E3225A88AD92DF1</code></li>
            <li>Type the command "<code>trust</code>" to enter an interactive mode where you set the trust level.</li>
            <li>Choose how much you trust the key. Ultimate trust or Fully trust are suggested.</li>
            <li>Use <code>gpg --update-trustdb</code></li>
            <li>Finally, extract the data with <code>gpg --output ./data.zip --decrypt ./data.zip.gpg</code></li>
            <li>If the player export is legitimately from Open RSC, you will receive the message "<code>gpg: Good signature from "Open RSC (Email address on this GPG key will probably not work for contacting us. Our admins' individual email addresses should be on git commits by Ken, Kenix, Logg, Luis, Marwolf or Ryan. If Discord still exists when you're reading this message, that's the best way to reach us, as of 2023-02-16!) <openrsc.emailer@gmail.com>" [ultimate]</code>" as part of the extraction output.</li>
        </ol>
        
        <h3><code>metadata.txt</code></h3>
        <p>This file contains important information for adminstrators considering importing a player.</p>
        <p>Here is an example metadata.txt file:</p>
        <code>
        Server: cabbage<br/>
        Timestamp: 1678813071348<br/>
        Muted: 0<br/>
        Banned: 0<br/>
        Offences: 0<br/>
        GPG Link: https://rsc.vet/openrsc-gpg-public-key-2023-02-16.key<br/>
        GPG Archive Link: https://web.archive.org/web/20230224020441/https://rsc.vet/openrsc-gpg-public-key-2023-02-16.key
        </code>
        <ul>
        <li>Server</li>
        <ul><li>You would want to verify that the Server is the intended server you wish to import. </li></ul>
        <li>Timestamp</li>
        <ul><li>This is a Unix timestamp with milliseconds. This will be important to verify if you would not like to accept very old exports, or when comparing two user's export times, you may not want to import both players' items to your server, since one player could have given their items to another player after exporting their account. Importing both players would be a "duplication bug" on your server. However, if the timestamp is after a hypothetical closing of Open RSC, or near to it, you would be able to accept both untrusted player's items without issue.</li></ul>
        <li>Muted / Banned</li>
        <ul><li>For player exports, we wipe the <strong>Muted</strong> and <strong>Banned</strong> fields, but preserve their original values in this file. This is useful for troublemakers who have been banned, since they will not need to figure out how to unban themselves in order to play single-player, but as a server administrator, it may be wise to verify that a user banned on Open RSC will not be a problem for you on your server (e.g., they might have lots of wealth on their account from a historic duping bug).</li></ul>
        <li>Offences</li>
        <ul><li>This field may contain information about the mute/ban. Currently, the number increments each time an "offense" is committed (see the openrsc core source code to see what that means), but sometimes the Offences number might be used to catalogue a specific type of offense. I used value 10 for players who were caught duping in early 2023, for example.</li></ul>
        <li>GPG Link / GPG Archive Link</li>
        <ul><li>We include this so that when extracting the data.zip.gpg file, you have a link to the public key needed to verify the signature. We also include the archive link, in case https://rsc.vet is no longer accessible.</li></ul>
        </ul>
        
        <h3><code>playerdata.db</code></h3>
        <p>As a foreign server administrator, you do not need this file. It is a SQLite database containing just the one user's data, intended for that player to use with a single-player server.</p>
        
        <h3><code>playerdata.sql</code></h3>
        <p>This file contains several <code>INSERT</code> statements with all of the user's data. You should be run this file without issue, importing to MariaDB or SQLite.</p>
        <p>If you are importing into a server with existing users, not from Open RSC, you will need to manually figure out how to change the <code>id</code> field of player in the player table, and then also update their player id for all the associated database tables. If the player id is not adjusted to be compatible with your server, you will encounter collisions between users by importing <code>playerdata.sql</code> without modification.</p>
        <p>If you haven't already started allowing new user registrations on your server, it would be sane to insert an entry into the players table with a high id, something like 100,000,000, so that AUTO_INCREMENT for new player ids will safely avoid the space where original Open RSC accounts were created (currently we are up to player IDs around 20,000 on the RSC Preservation server)</p>
        <p>We trust you are able to handle this.</p>
        
        <p>Thanks on behalf of the entire Open RSC Team,</p>
        <p>&mdash; Logg</p>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection