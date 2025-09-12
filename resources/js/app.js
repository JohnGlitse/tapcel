import './bootstrap';


// const banner = document.getElementsByClassName('banner')[0];
// let slide = document.getElementsByClassName('slide');
// const arrowLeft = document.querySelector('.arrow-left');
// const arrowRight = document.querySelector('.arrow-left');
// let index = 1;
// let interval = 2000;

// const firstNode = slide[0].cloneNode(true);
// const secondNode = slide[slide.length - 1].cloneNode(true);
// banner.append(firstNode);
// banner.prepend(secondNode);
// firstNode.id = 'first-node';
// secondNode.id = 'second-node';

// const clientWidth = slide[index].clientWidth;
// banner.style.transform = `translate(${-clientWidth * index}px)`;

// const startSlide = () => {
//     setInterval(()=>{
//         index++;
//         if(index === slide.length){
//             index = 1;
//         }
//         banner.style.transform = `translate(${-clientWidth * index}px)`;
//         banner.style.transition = '0.8s'
//     }, interval);
// }

// //  banner.addEventListener('transitioned', ()=>{
// //     slide = document.querySelectorAll('.slide');
// //     if(slide[index].id === firstNode.id){
// //         banner.style.transition = 'none';
// //         index = 1;
// //         banner.style.transform = `translate(${-clientWidth * index}px)`;
// //         banner.style.transition = 'none';
// //     }
// //  })

//  		  banner.addEventListener('transitionend', ()=>{
// 		  	 slide = document.querySelectorAll('.slide')
// 		  	if (slide[index].id === firstNode.id) {
// 		  	    banner.style.transition = 'none'
// 		  		index = 1
// 		  		banner.style.transform = `translate(${-clientWidth * index}px)`  
// 		  	}

// 		  })


// startSlide();





import './bootstrap';


const banner = document.getElementsByClassName('banner')[0];
let slide = document.getElementsByClassName('slide');
const arrowLeft = document.querySelector('.arrow-left');
const arrowRight = document.querySelector('.arrow-left');
let index = 1;
let interval = 3000;

if(banner && slide.length > 0){
const firstNode = slide[0].cloneNode(true);
const secondNode = slide[slide.length - 1].cloneNode(true);

banner.append(firstNode);
banner.prepend(secondNode);
firstNode.id = 'first-node';
secondNode.id = 'second-node';

const clientWidth = slide[index].clientWidth;
//banner.style.transform = `translate(${-clientWidth * index}px)`;

const startSlide = () => {
    setInterval(()=>{
        index++;
        if(index === slide.length){
            index = 1;
        }
        banner.style.transform = `translate(${-clientWidth * index}px)`;
        banner.style.transition = '0.8s'
    }, interval);
}

//  banner.addEventListener('transitioned', ()=>{
//     slide = document.querySelectorAll('.slide');
//     if(slide[index].id === firstNode.id){
//         banner.style.transition = 'none';
//         index = 1;
//         banner.style.transform = `translate(${-clientWidth * index}px)`;
//         banner.style.transition = 'none';
//     }
//  })

 		  banner.addEventListener('transitionend', ()=>{
		  	 slide = document.querySelectorAll('.slide')
		  	if (slide[index].id === firstNode.id) {
		  	    banner.style.transition = 'none'
		  		index = 1
		  		banner.style.transform = `translate(${-clientWidth * index}px)`  
		  	}

		  })


startSlide();
        }

/// HIDING THE SUCCESS MESSAGE THAT FOLLOWS PRODUCTS ADDED TO CART
// const added = document.getElementsByClassName('added')[0];
 
//             setTimeout(() => {
//                added.style.display = 'none';
//             }, 2000);

//// CODE FOR DISPLAYING MENU ITEMS ON MOBILE DEVICES

const navbar = document.getElementsByTagName('nav')[0];
const bars = document.getElementsByClassName('fa-bars')[0];
 
// if(bars && navbar.length > 0){
    bars.addEventListener('click', ()=>{
    navbar.classList.toggle('active');
});
// }

 




