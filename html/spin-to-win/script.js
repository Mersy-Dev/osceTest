const items = [
  { name: "Pens", probability: 0.2, display_name: "Pen", icon: "pen.png" },
  { name: "Tote bags", probability: 0.15, display_name: "Tote<br>bag", icon: "bag.png"  },
  { name: "1 Month Subscription", probability: 0.05, display_name: "1 Month<br>Subscription", icon: "gift.png" },
  { name: "Candy", probability: 0.15, display_name: "Candy", icon: "candy.png" },
  { name: "Octavius Plushy", probability: 0.05, display_name: "Octavius<br>Plushy", icon: "osctavius.png" },
  { name: "Laptop sticker", probability: 0.3, display_name: "Laptop<br>sticker", icon: "laptop.png" },
  { name: "20% off", probability: 0.1, display_name: "20%<br>off", icon: "20-off.png" },
];

const wheel = document.getElementById("wheel-container");
const spinBtn = document.getElementById("spin");
const modal = document.getElementById("modal");
const modalMessage = document.getElementById("modal-message");
const closeModal = document.getElementsByClassName("close")[0];
const accessCodeForm = document.getElementById("access-code-form");
const accessCodeInput = document.getElementById("access-code");
const submitCodeBtn = document.getElementById("submit-code");
const spinsCountDisplay = document.getElementById("spins-count");
var wheel_triangle = document.getElementById('wheel-triangle');

let spinsLeft = 1;

function showModal(message) {
  modalMessage.innerHTML = message;
  modal.style.display = "block";
}

function createWheel() {
  const totalItems = items.length;
  const rotationAngle = 360 / totalItems;
  let currentRotation = 0;

  items.forEach((item, index) => {
    const sector = document.createElement("div");
    const text = document.createElement("p");

    sector.className = `sector-${index + 1}`;
    text.innerHTML = item.display_name + `<br> <img src="images/${item.icon}" alt="${item.display_name}">`;
    // sector.style.backgroundColor = item.color;
    wheel.appendChild(sector);
    sector.appendChild(text);
    currentRotation += rotationAngle;
  });
}

function spinWheel() {
  spinBtn.disabled = true;

  fetch("index.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "action=spin",
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      if (data.error) {
        showModal(data.error);
        spinBtn.disabled = false;
      } else {
        const resultIndex = items.findIndex(
          (item) => item.name === data.result
        );
        const spinDegrees =
          360 * 5 + (360 / items.length) * (items.length - resultIndex);

        wheel.style.transition =
          "transform 5s cubic-bezier(0.25, 0.1, 0.25, 1)";
        wheel.style.transform = `rotate(${spinDegrees}deg)`;
        wheel_triangle.classList.add('triangle-spinning');
        
        setTimeout(() => {
          wheel_triangle.classList.remove('triangle-spinning');
          if (data.result == "1 Month Subscription" || data.result == "20% off") {
            showModal(`Awesome! You won ${data.result}. Take a picture of this and DM us on Instagram or email us at <a href='mailto:leya@oscetoolbox.com'>leya@oscetoolbox.com</a> to claim!`);
          }
          else if (data.result == "Pens"){
            showModal(`You won a pen!`);
          }
          else if (data.result == "Tote bags"){
            showModal(`You won a Tote bag!`);
          }
          else if (data.result == "Candy"){
            showModal(`You won some candy!`);
          }
          else if (data.result == "Octavius Plushy"){
            showModal(`You won an Octavius Plushy!`);
          }
          else if (data.result == "Laptop sticker"){
            showModal(`You won a Laptop sticker!`);
          }
          else{
            // check if null
            if (data.result == null){
              // showModal(`You won nothing!`);
            }
          }
          spinsLeft--;
          // updateSpinsLeftDisplay();
          spinBtn.disabled = false;

          // Confetti settings
            confetti({
              particleCount: 500,
              spread: 170,
              origin: { y: 0.6 }
          });

        }, 5000);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showModal("An error occurred. Please try again.");
      spinBtn.disabled = false;
    });
}

function updateSpinsLeftDisplay() {
  spinsCountDisplay.textContent = spinsLeft;
  if (spinsLeft === 0) {
    spinBtn.disabled = true;
  } else {
    spinBtn.disabled = false;
  }
}

function submitAccessCode() {
  const code = accessCodeInput.value.trim();

  fetch("index.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `action=checkCode&code=${encodeURIComponent(code)}`,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.valid) {
        spinsLeft += 1;
        updateSpinsLeftDisplay();
        showModal("Access code accepted. You have 1 more spins!");
      } else {
        showModal("Invalid access code. Please try again.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showModal("An error occurred. Please try again.");
    });
}

closeModal.onclick = function () {
  window.location.reload();
  console.log("closed");
  // modal.style.display = "none";
  // // reset spin
  // wheel.style.transition = "1s";
  // wheel.style.transform = "rotate(0deg)";
  
};

window.onclick = function (event) {
  if (event.target == modal) {
    window.location.reload();
    console.log("closed");
  }
};

// add event listener for container2 to trigger spin button
wheel.addEventListener("click", function(){
  spinWheel();
});

document.addEventListener("DOMContentLoaded", () => {
  createWheel();
  // submitCodeBtn.addEventListener("click", submitAccessCode);
  spinBtn.addEventListener("click", spinWheel);

  // Check if user has a free spin
  fetch("index.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "action=checkFreeSpin",
  })
    .then((response) => response.json())
    .then((data) => {
      spinsLeft = data.freeSpinAvailable ? 1 : 0;
      // updateSpinsLeftDisplay();
    })
    .catch((error) => {
      console.error("Error:", error);
      showModal("An error occurred. Please try again.");
    });
});
