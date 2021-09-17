var GoogleAuth;
var SCOPE = 'https://www.googleapis.com/auth/drive.metadata.readonly';

function handleClientLoad() {
    // Load the API's client and auth2 modules.
    // Call the initClient function after the modules load.
    gapi.load('client:auth2', initClient);
}

function initClient() {
    // In practice, your app can retrieve one or more discovery documents.
    var discoveryUrl = 'https://people.googleapis.com/$discovery/rest?version=v1';

    // Initialize the gapi.client object, which app uses to make API requests.
    // Get API key and client ID from API Console.
    // 'scope' field specifies space-delimited list of access scopes.
    gapi.client.init({
        'apiKey': document.getElementById('googleApiKey').value,
        'clientId': document.getElementById('googleClientKey').value,
        'discoveryDocs': [discoveryUrl],
        'scope': 'https://www.googleapis.com/auth/contacts'
    }).then(function() {
        GoogleAuth = gapi.auth2.getAuthInstance();

        // Listen for sign-in state changes.
        GoogleAuth.isSignedIn.listen(updateSigninStatus);

        // Handle initial sign-in state. (Determine if user is already signed in.)
        // var user = GoogleAuth.currentUser.get();
        // 3. Initialize and make the API request.

        // setSigninStatus();
        // Call handleAuthClick function when user clicks on
        //      "Sign In/Authorize" button.
        $('#sign-in-or-out-button').click(function() {
            handleAuthClick();
        });
        // $('#revoke-access-button').click(function() {
        // 	revokeAccess();
        // });

    })
}
var contactsArr = [];

function handleAuthClick() {
    if (GoogleAuth.isSignedIn.get()) {
        // User is authorized and has clicked "Sign out" button.
        // GoogleAuth.signOut();
        // } else {
        // User is not signed in. Start Google auth flow.
        gapi.client.request({
            'path': 'https://people.googleapis.com/v1/people/me/connections?requestMask.includeField=person.emailAddresses',
        }).then(function(response) {
            // console.log("response", response.result);

            response.result.connections.forEach(itm => {
                // console.log(itm, itm.emailAddresses)
                if (itm.emailAddresses) {
                    contactsArr.push(itm.emailAddresses[0].value);
                }
            });

            document.getElementById('googleContacts').value = JSON.stringify(contactsArr);
            document.getElementById('syncform').submit();

        }, function(reason) {
            console.log('Error: ' + reason.result.error.message);
            $('.emailErrorMsg ul li').text('Error while fetching contacts!');
            $('.emailErrorMsg').show();
        });
    } else {
        GoogleAuth.signIn();
        var interval = setInterval(function() {
            if (GoogleAuth.isSignedIn.get()) {
                clearInterval(interval);
                handleAuthClick();
            }
        }, 200)
    }
}

function revokeAccess() {
    GoogleAuth.disconnect();
}

function setSigninStatus() {
    var user = GoogleAuth.currentUser.get();
    var isAuthorized = user.hasGrantedScopes(SCOPE);
    if (isAuthorized) {
        // $('#sign-in-or-out-button').html('Sign out');
        $('#sign-in-or-out-button').css('cursor', 'unset');
        // $('#revoke-access-button').css('display', 'inline-block');
        // $('#auth-status').html('You are currently signed in and have granted ' +
        // 	'access to this app.');
    } else {
        // $('#sign-in-or-out-button').html('Sign In/Authorize');
        // $('#revoke-access-button').css('display', 'none');
        // $('#auth-status').html('You have not authorized this app or you are ' +
        // 	'signed out.');
    }
}

function updateSigninStatus() {
    setSigninStatus();
}