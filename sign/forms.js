/* 
 * Copyright (C) 2013 peredur.net
 * This program is free software:.
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function formHash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    let p = document.createElement("input");
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    // Finally submit the form.
    form.submit();
}
function regformhash(form, username, email, password, confirm_password) {
    // Check each field has a value
    if (username.value === '' || email.value === '' || password.value === '' || confirm_password.value === '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    // Check the username
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
    // Check that the password, min 8
    // The check is duplicated below, same?
    if (password.value.length < 8) {
        alert('Passwords must be at least 8 characters long.  Please try again');
        form.password.focus();
        return false;
    }
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
    // Check password and confirmation are the same
    if (password.value !== confirm_password.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
    // Finally submit the form. 
    form.submit();
    return true;
}
