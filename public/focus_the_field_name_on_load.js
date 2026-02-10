document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM fully loaded and parsed');
    if (document.querySelector("#ctrl_title")) {
        document.querySelector("#ctrl_title").focus()
    }
})