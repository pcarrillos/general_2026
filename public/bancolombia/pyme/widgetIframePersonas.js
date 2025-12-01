
window.addEventListener("load", () => {
  var ifrm = document.createElement("iframe");
  ifrm.setAttribute("src", "https://serviciosvirtuales-wd.apps.bancolombia.com/personas");
  ifrm.id = "iFrameResizer";
  ifrm.style.maxHeight = "100vh";
  ifrm.style.maxWidth = "100vw";
  ifrm.style.height = "0px";
  ifrm.style.width = "0px";
  ifrm.allowtransparency = true;
  ifrm.scrolling = "no";
  ifrm.frameBorder = "0";
  ifrm.style.overflow = "hidden";
  ifrm.style.position = "fixed";
  ifrm.style.bottom = "0px";
  ifrm.style.right = "0px";
  ifrm.style.zIndex = "999999";
  ifrm.allow = "camera;microphone";
  document.body.appendChild(ifrm);
});
function handleMessage(e) {
  if (e.data.action != undefined) {
    if (window.innerHeight > window.innerWidth) {
      document.body.style.overflow=""
      if (e.data.action == 'EXIT') {
        if(window.screen.height < 1023){
          document.getElementById("iFrameResizer").style.height = window.innerHeight / 5.5 - (window.innerHeight / 100) + "px";
          document.getElementById("iFrameResizer").style.width = window.innerWidth / 3 - (window.innerWidth / 100) + "px";
        }
        else{
          document.getElementById("iFrameResizer").style.height = window.innerHeight / 10 - (window.innerHeight / 100) + "px";
          document.getElementById("iFrameResizer").style.width = window.innerWidth / 4 - (window.innerWidth / 100) + "px";
        }
      } else {
        document.getElementById("iFrameResizer").style.height = "90vh";
        document.getElementById("iFrameResizer").style.width = "100vw";
        document.body.style.overflow="hidden"
      }
    } else {
      if (e.data.action == 'MENU') {
        document.getElementById("iFrameResizer").style.height = "100vh";
        document.getElementById("iFrameResizer").style.width = "100vw";
        document.getElementById("iFrameResizer").style.right = "0px";
      }
      if (e.data.action == 'ITEM') {
        document.getElementById("iFrameResizer").style.height = "85vh";
        document.getElementById("iFrameResizer").style.width = "375px";
        document.getElementById("iFrameResizer").style.right = "20px";
      }
      if (e.data.action == 'SURVEY') {
        document.getElementById("iFrameResizer").style.height = "85vh";
        document.getElementById("iFrameResizer").style.width = "1000px";
        document.getElementById("iFrameResizer").style.right = "20px";
      }
      if (e.data.action == 'EXIT') {
        document.getElementById("iFrameResizer").style.height = window.innerHeight / 6 - (window.innerHeight / 100) + "px";
        document.getElementById("iFrameResizer").style.width = window.innerWidth / 6 - (window.innerWidth / 100) + "px";
        document.getElementById("iFrameResizer").style.right = "0px";
      }
    }
  }
}
window.addEventListener('message', handleMessage, false);