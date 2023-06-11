/**
 *
 * @param {String} msg
 * @returns String
 */

function errorMsg(msg) {
  let response;
  switch (msg) {
    case "auth/user-not-found":
      response = "There is no existing user record corresponding to the provided credentials.";
      break;

    case "auth/wrong-password":
      response = "Email or Password is incorrect";
      break;

    case "auth/email-already-exists":
      response = "An account already existing with this email address";
      break;

    case "auth/invalid-phone-number":
      response =
        "The provided value for the phoneNumber is invalid. It must be a non-empty E.164 standard compliant identifier string.";
      break;

    case "auth/phone-number-already-exists":
      response = "An account already existing with this phone number";
      break;

    case "auth/uid-already-exists":
      response =
        "The provided uid is already in use by an existing user. Each user must have a unique uid. Please try again";
      break;

    case "auth/invalid-action-code":
      response = "This link is expired or invalid";
      break;

    case "auth/network-request-failed":
      response = "Unable to connect! check your network connection & try again";
      break;

    default:
      response = "Unknown Error occurred, try again shortly!";
      break;
  }

  return response;
}

export default errorMsg;
