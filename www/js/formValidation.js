/**
 * Function that collect the data in the form and then send to the server
 * @async
 * @returns {Promise<void>}
 */
async function submitForm() {
<<<<<<< HEAD
    try {
      const name = document.getElementById('name').value
      const email = document.getElementById('email').value
      const subject = document.getElementById('subject').value
      const message = document.getElementById('message').value
  
      console.log("Input", name, email, subject, message)
    } catch (e) {
      console.error("Error", e)
    }
  }
  
  /**
   * Function that show the modal with the id modalLogin
   */
  function showLoginModal() {
    $('#modalLogin').modal('show')
  }
  
  /**
   * Function that hide the modal with the id modalLogin
   */
  function hideLoginModal() {
    $('#modalLogin').modal('hide')
  }
  
  /**
   * Function that send the credential to the server
   * @async
   * @returns {Promise<void>}
   */
  async function loginService () {
      try {
          const email = document.getElementById('emailLogin').value
          const password = document.getElementById('passwordLogin').value
          if (!email || !password) return // here to be sure that the field are not empty
  
          // request ver le server
          // attendre la reponse
          // si la reponse est bon
          // alor tu arret le modal
          // si non lance un message d'error
  
          console.log("Email and password", email, password)
          hideLoginModal()
      }catch (e){
          console.error("Error", e)
      }
  }
  
=======
  try {
    const name = document.getElementById('name').value
    const email = document.getElementById('email').value
    const subject = document.getElementById('subject').value
    const message = document.getElementById('message').value

    console.log("Input", name, email, subject, message)
  } catch (e) {
    console.error("Error", e)
  }
}

/**
 * Function that show the modal with the id modalLogin
 */
function showLoginModal() {
  $('#modalLogin').modal('show')
}

/**
 * Function that hide the modal with the id modalLogin
 */
function hideLoginModal() {
  $('#modalLogin').modal('hide')
}

/**
 * Function that send the credential to the server
 * @async
 * @returns {Promise<void>}
 */
async function loginService () {
    try {
        const email = document.getElementById('emailLogin').value
        const password = document.getElementById('passwordLogin').value
        if (!email || !password) return // here to be sure that the field are not empty

        // request ver le server
        // attendre la reponse
        // si la reponse est bon
        // alor tu arret le modal
        // si non lance un message d'error

        console.log("Email and password", email, password)
        hideLoginModal()
    }catch (e){
        console.error("Error", e)
    }
}
>>>>>>> main
