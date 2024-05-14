const asideMenu = document.querySelector("aside");
const menuBtn   = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");


//showinf menu
menuBtn.addEventListener("click",()=>{
    asideMenu.style.display ='block';
});

//close menu
closeBtn.addEventListener("click", ()=>{
    asideMenu.style.display ="none";
});

//#changine theme mode

themeToggler.addEventListener("click",()=>{
    document.body.classList.toggle("dark-theme-variables");

    themeToggler.querySelector('span:nth-child(1)').classList.toggle("active");
    themeToggler.querySelector('span:nth-child(2)').classList.toggle("active");
})

//showing table info
// show table
Orders.forEach(order => {
    const tr = document.createElement('tr');
    const trContent = `
                        <td>${order.productName}</td>
                        <td>${order.productNumber}</td>
                        <td>${order.paymentStatus}</td>
                        <td class="${order.shipping === 'Declined' ? 'danger' : order.shipping === 'pending' ? 'warning' : 'primary'}">${order.shipping}</td>
                        <td class="primary">Details</td>
                        `;

    tr.innerHTML = trContent;
    document.querySelector('table tbody').appendChild(tr)
})

// Get the current time
var currentTime = new Date();

// Format the time as "HH:mm"
var hours = currentTime.getHours().toString().padStart(2, '0');
var minutes = currentTime.getMinutes().toString().padStart(2, '0');
var currentTimeString = hours + ":" + minutes;

// Set the value of the time input to the current time
document.getElementById("timeInput").value = currentTimeString;