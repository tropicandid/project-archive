import React, { useState, useRef, useEffect } from 'react'

import JSONData from "../content/mission.json"

import { gsap } from "gsap";
import ScrollToPlugin from "gsap/ScrollToPlugin";
import ScrollTrigger from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin);
gsap.registerPlugin(ScrollTrigger);

const Mission = () =>  {

	const [ missionOpenClicked, setMissionOpenClicked ] = useState(false),
		missionSectionRef = useRef(null),
		missionBackgroundVideo = useRef(null),
		missionOverlayVideo = useRef(null);

	function missionPlayBackgroundVid() {
		if (window.innerWidth >= 900) {
		    missionBackgroundVideo.current.play();
		}
	}

	function missionPauseBackgroundVid() {
	    missionBackgroundVideo.current.pause();
	}

	function missionPlayOverlayVid() {
		missionOverlayVideo.current.src = `${JSONData.videoSrc}`;
	}

	function missionStopOverlayVid() {
		missionOverlayVideo.current.src = ``;
	}

	useEffect(() => {

		gsap.timeline({
	        scrollTrigger: {
	         	trigger: missionSectionRef.current,
	          	start: "top center",
	          	endTrigger: missionSectionRef.current,
	          	end: "bottom top"
	        }
	    });

	}, []);

	return (

		<section id="mission" className="page-section alt alt-pad mission" ref={missionSectionRef}>
		
			<div className="mission-content">
				<div className="container">

					<div className="mission-content-inner">
						<h2 dangerouslySetInnerHTML={{ __html:JSONData.title }}></h2>
						<p>{JSONData.description}</p>
					</div>
					
				</div>
			</div>

			<div className="mission-video-wrapper">

				<video muted loop autoPlay id="mission-video" ref={missionBackgroundVideo}>
					<source src="video/mission-background.mp4" type="video/mp4" />
				</video>

				<div className="mission-video-caption">
					<p>{JSONData.videoCaptionName}<br/><span>{JSONData.videoCaptionTitle}</span></p>
				</div>

			</div>

			<div 
				className={missionOpenClicked === true ? "hide play-btn mission-video-play" : "play-btn mission-video-play"}
				onClick={ () => {
					setMissionOpenClicked(!missionOpenClicked);
					missionPauseBackgroundVid();
					missionPlayOverlayVid();
				}}
		        onKeyDown={ () => {
					setMissionOpenClicked(!missionOpenClicked);
					missionPauseBackgroundVid();
					missionPlayOverlayVid();
				}}
		        role = "button" 
		        tabIndex="0"
		        aria-label="Play Mission Video"
			></div>

			<div className={missionOpenClicked ? "open overlay" : "overlay"}>
				<div className="responsive-iframe">

					<div
						id="mission-overlay-close"
						className="responsive-iframe-close"
						onClick={ () => {
							setMissionOpenClicked(!missionOpenClicked);
							missionPlayBackgroundVid();
							missionStopOverlayVid()
						}}
				        onKeyDown={ () => {
							setMissionOpenClicked(!missionOpenClicked);
							missionPlayBackgroundVid();
							missionStopOverlayVid()
						}}
				        role = "button" 
				        tabIndex="0"
				        aria-label="Close Mission Video"
					></div>

					<div className="responsive-iframe-container">
						<iframe
				        	className="responsive-iframe-iframe mission-iframe"
				            src=""
				            title={JSONData.videoTitle}
				            frameBorder="0"
				            allowFullScreen
				            ref={missionOverlayVideo}
				    	/>
				    </div>

			    </div>
			</div>

		</section>

	)

}

export default Mission