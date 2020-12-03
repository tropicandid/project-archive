import React, { useState, useRef } from 'react'

import JSONData from "../content/vision.json";

import { ParallaxProvider, Parallax } from 'react-scroll-parallax';
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';

const Vision = () =>  {

	const [ visionOpenClicked, setVisionOpenClicked ] = useState(false),
		visionOverlay = useRef(null),
		visionOverlayVideo = useRef(null);

	function visionPlayOverlay(src, title) {
		visionOverlayVideo.current.src = src;
		visionOverlayVideo.current.title = title;
		disableBodyScroll(visionOverlay.current);
	}

	function visionStopOverlay() {
		visionOverlayVideo.current.src = ``;
		enableBodyScroll(visionOverlay.current);
	}

	return (

		<ParallaxProvider>

			<section id="vision">

				<section className="page-section vision alt-pad2">
					<div className="container">

						<section className="vision-header">
							<h2 dangerouslySetInnerHTML={{ __html:JSONData.header }} className="center white"></h2>
							<h3 className="center white">{JSONData.subheader}</h3>
						</section>

						<section className="vision-boxes">

							<section className="vision-boxes-left">
					            {JSONData.content.map((data, index) => {

					            	const videoSrc = data.videoSrc,
											videoTitle = data.videoTitle,
											imageStart = data.imagePositionStart,
											imageEnd = data.imagePositionEnd;

					              	if ( index === 0 || index === 1 ) {

						                return (
						                	<div key={index}>
						                	
							                	<Parallax y={[imageStart, imageEnd]} tagOuter="vision-parallax">
								                    
								                    <div className={`vision-boxes-box box-${index} desktop-box`}>

													    <div className="vision-boxes-box-inner">

													        <p className="vision-boxes-title">{data.title}</p>

													        <img src={data.image} alt={data.imageAlt} />

													        <div 
																className="play-btn vision-boxes-play"
																onClick={ () => {
																	setVisionOpenClicked(!visionOpenClicked);
																	visionPlayOverlay(videoSrc, videoTitle);
																}}
														        onKeyDown={ () => {
																	setVisionOpenClicked(!visionOpenClicked);
																	visionPlayOverlay(videoSrc, videoTitle);
																}}
														        role = "button" 
														        tabIndex="0"
														        aria-label="Play Vision Video"
															></div>

													        <p className="vision-boxes-description">{data.description}</p>
												        <p className="featured-text" dangerouslySetInnerHTML={{ __html:data.featureText}}></p>
													      
														</div>

											    	</div>

											    </Parallax>

											    <div className={`vision-boxes-box box-${index} mobile-box`} >

												    <div className="vision-boxes-box-inner">

												        <p className="vision-boxes-title">{data.title}</p>

												        <img src={data.image} alt={data.imageAlt} />

												        <div 
															className="play-btn vision-boxes-play"
															onClick={ () => {
																setVisionOpenClicked(!visionOpenClicked);
																visionPlayOverlay(videoSrc, videoTitle);
															}}
													        onKeyDown={ () => {
																setVisionOpenClicked(!visionOpenClicked);
																visionPlayOverlay(videoSrc, videoTitle);
															}}
													        role = "button" 
													        tabIndex="0"
													        aria-label="Play Vision Video"
														></div>

												        <p className="vision-boxes-description">{data.description}</p>
												        <p className="featured-text" dangerouslySetInnerHTML={{ __html:data.featureText}}></p>
													</div>

										    	</div>
										    </div>
						                )

					              	}
					              	else {
					                	return null
					              	}

					            })}
					        </section>

					        <section className="vision-boxes-right">
					            {JSONData.content.map((data, index) => {

					            	const videoSrc = data.videoSrc,
											videoTitle = data.videoTitle,
											imageStart = data.imagePositionStart,
											imageEnd = data.imagePositionEnd;

					              	if ( index === 2 || index === 3 ) {
					                	return (
					                		<div key={index}>
					                		
						                		<Parallax y={[imageStart, imageEnd]} tagOuter="vision-parallax">
												    
								                    <div className={`vision-boxes-box desktop-box box-${index}`}>

													    <div className="vision-boxes-box-inner">

													        <p className="vision-boxes-title">{data.title}</p>

													        <img src={data.image} alt={data.imageAlt} />

													         <div 
																className="play-btn vision-boxes-play"
																onClick={ () => {
																	setVisionOpenClicked(!visionOpenClicked);
																	visionPlayOverlay(videoSrc, videoTitle);
																}}
														        onKeyDown={ () => {
																	setVisionOpenClicked(!visionOpenClicked);
																	visionPlayOverlay(videoSrc, videoTitle);
																}}
														        role = "button" 
														        tabIndex="0"
														        aria-label="Play Vision Video"
															></div>

													        <p className="vision-boxes-description">{data.description}</p>
												        <p className="featured-text" dangerouslySetInnerHTML={{ __html:data.featureText}}></p>

														</div>

												    </div>

												</Parallax>

												<div className={`vision-boxes-box mobile-box box-${index}`}>

												    <div className="vision-boxes-box-inner">

												        <p className="vision-boxes-title">{data.title}</p>

												        <img src={data.image} alt={data.imageAlt} />

												         <div 
															className="play-btn vision-boxes-play"
															onClick={ () => {
																setVisionOpenClicked(!visionOpenClicked);
																visionPlayOverlay(videoSrc, videoTitle);
															}}
													        onKeyDown={ () => {
																setVisionOpenClicked(!visionOpenClicked);
																visionPlayOverlay(videoSrc, videoTitle);
															}}
													        role = "button" 
													        tabIndex="0"
													        aria-label="Play Vision Video"
														></div>

												        <p className="vision-boxes-description">{data.description}</p>
												        <p className="featured-text" dangerouslySetInnerHTML={{ __html:data.featureText}}></p>

													</div>

												</div>
											</div>
					                  	)
					              	}
					              	else {
					                	return null
					              	}

					            })}
					        </section>

						</section>

					</div>

				</section>

				<div className={visionOpenClicked ? "open overlay fixed" : "overlay fixed"} ref={visionOverlay}>
					<div className="responsive-iframe">

						<div
							id="vision-overlay-close"
							className="responsive-iframe-close"
							onClick={ () => {
								setVisionOpenClicked(!visionOpenClicked);
								visionStopOverlay();
							}}
					        onKeyDown={ () => {
								setVisionOpenClicked(!visionOpenClicked);
								visionStopOverlay();
							}}
					        role = "button" 
					        tabIndex="0"
					        aria-label="Close Mission Video"
						></div>

						<div className="responsive-iframe-container">
							<iframe
					        	className="responsive-iframe-iframe mission-iframe"
					            src=""
					            title="Vision iframe"
					            frameBorder="0"
					            allowFullScreen
					            ref={visionOverlayVideo}
					    	/>
					    </div>

				    </div>
				</div>

			</section>

		</ParallaxProvider>

	)

}

export default Vision