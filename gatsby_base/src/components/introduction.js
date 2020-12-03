import React, { useRef, useEffect } from 'react'

import JSONData from "../content/introduction.json"

import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';

import { gsap } from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const Introduction = () => {
	
	
	const introductionSection = useRef(null),
		introductionSectionOne = useRef(null),
		introductionSectionTwo = useRef(null),
		introductionCanvas = useRef(null),
		introductionContent = useRef(null),
		introductionBodyContent = useRef(null),
		introductionBackground = useRef(null),
		preloadFrameCount = 24,
		frameCount = 83;

	useEffect(() => {

		const context = introductionCanvas.current.getContext("2d");

		const currentFrame = index => (
		    `../../images/introduction-frames/${index.toString().padStart(4, '0')}.png`
		)

		const preloadImages = () => {
		    for (let i = 1; i < preloadFrameCount; i++) {
		        const img = new Image();
		        img.src = currentFrame(i);
		    }
		};

		const img = new Image()
		img.src = currentFrame(1);
		introductionCanvas.current.width = 1920;
		introductionCanvas.current.height = 1088;
		img.onload=function() {
		    context.drawImage(img, 0, 0);
		}

		const updateImage = index => {

			if ( index < 24 ) {
				img.src = currentFrame(index);
			}
			else {
				img.src = `../../images/introduction-frames/0024.png`
			}
		    
		    context.drawImage(img, 0, 0);

		}

		window.addEventListener('scroll', () => {  

			const html = document.documentElement;
		    const scrollTop = html.scrollTop;
		    const maxScrollTop = window.innerHeight + 700;
		    const scrollFraction = scrollTop / maxScrollTop;
		    const frameIndex = Math.min(
		        frameCount - 1,
		        Math.ceil(scrollFraction * frameCount)
		    );
		    requestAnimationFrame(() => updateImage(frameIndex + 1))

		});

		preloadImages();


		let introductionContentAnimation = gsap.timeline({
	        scrollTrigger: {
	         	trigger: introductionSectionTwo.current,
	          	start: "top top",
	          	end: "bottom top",
	          	toggleActions: "restart pause complete reset",
	          	onEnter: self => {
	          		disableBodyScroll(introductionSectionTwo.current);
	          		// Check for active class on menu
	          		var homeMenuItem = document.getElementById("home");
	          		console.log("ENTERED");
	          		setTimeout(function() {

		          		if(homeMenuItem.classList.contains("active")){
		          			console.log("FIRST");
			          		setTimeout(function() {
			          			enableBodyScroll(introductionSectionTwo.current);
			          		}, 3000);
		          		} else {
		          			console.log("OTHERS");
		          			enableBodyScroll(introductionSectionTwo.current);
		          		}

		          	}, 400);

				}
	        }
	    });

	    introductionContentAnimation
		    .fromTo(
		        introductionContent.current,
		        {
		            opacity: 0,
		            duration: .5
		        },
		        {
		            opacity: 1,
		            duration: .5
		        },
		        1
		    );

		let introductionBodyContentAnimation = gsap.timeline({
	        scrollTrigger: {
	         	trigger: introductionSectionTwo.current,
	          	start: "top top",
	          	end: "bottom top",
	          	toggleActions: "restart pause complete reset"
	        }
	    });

	    introductionBodyContentAnimation
		    .fromTo(
		        introductionBodyContent.current,
		        {
		            opacity: 0,
		            duration: .5,
		            delay: .5
		        },
		        {
		            opacity: 1,
		            duration: .5,
		            delay: .5
		        },
		        1
		    );

		let introductionBackgroundAnimation = gsap.timeline({
	 		scrollTrigger: {
				trigger: introductionSectionTwo.current,
					start: "top top",
					end: "bottom top",
					toggleActions: "restart pause complete reset"
			}
		});

	    introductionBackgroundAnimation
		    .fromTo(
		        introductionBackground.current,
		        {
		            opacity: 0,
		            duration: .5,
		            delay: 1
		        },
		        {
		            opacity: 1,
		            duration: .5,
		            delay: 1
		        },
		        1
		    );

		let introductionSection = gsap.timeline({
		    scrollTrigger: {
		      	trigger: introductionSectionTwo.current,
		      	start: "top top",
		      	endTrigger: introductionSectionTwo.current,
		      	end: "bottom bottom",
		      	pin: true,
		      	pinSpacing: false
		    }
		});

		introductionSection.to(introductionSectionTwo.current, {backgroundColor: "transparent"});

	}, []);
	
	return (

		<section id="introduction" className="introduction" ref={introductionSection}>
				
			<section className="introduction-images-wrapper">

				<canvas id="introduction-images" ref={introductionCanvas}>Animating Images on Scroll</canvas>

			</section>

			<section className="introduction-one" ref={introductionSectionOne}></section>

			<section className="introduction-two" ref={introductionSectionTwo}>

				<div className="introduction-background" ref={introductionBackground}></div>

				<div className="introduction-content" ref={introductionContent}>
					<div className="introduction-content-inner">
						<h1 className="introduction-header">{JSONData.header}</h1>
						<h2 className="introduction-subheader">{JSONData.subheader}</h2>
						<p className="introduction-body" ref={introductionBodyContent}>{JSONData.body}</p>
					</div>
				</div>

			</section>

		</section>

	)

}

export default Introduction