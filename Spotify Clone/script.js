const music = document.getElementById('musicName');
const play = document.getElementsById('play');
play.addEventListener('click', () => {
   console.log("ok");
   music.play();
  });