const happyCounter = document.getElementById('happy-client');
const soldCounter = document.getElementById('sold-counter');
const likedCounter = document.getElementById('likes-counter');
const reviewCounter = document.getElementById('review-counter');

const happyClientTarget = 2152;
const soldTarget = 2345;
const likedTarget = 1984;
const reviewTarget = 1056;

let happyCount = 0;
let soldCount = 0;
let likedCount = 0;
let reviewCount = 0;

function animateCounter(counter, targetCount) {
  const increment = targetCount / 60;
  let currentCount = 0;
  const intervalId = setInterval(() => {
    currentCount += increment;
    counter.textContent = Math.round(currentCount);
    if (currentCount >= targetCount) {
      counter.textContent = targetCount;
      clearInterval(intervalId);
    }
  }, 83);
}

animateCounter(happyCounter, happyClientTarget);
animateCounter(soldCounter, soldTarget);
animateCounter(likedCounter, likedTarget);
animateCounter(reviewCounter, reviewTarget);

setTimeout(() => {
  happyCounter.classList.add('animated');
  soldCounter.classList.add('animated');
  likedCounter.classList.add('animated');
  reviewCounter.classList.add('animated');
}, 1000);
