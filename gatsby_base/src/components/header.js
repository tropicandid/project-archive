import React, { useState } from 'react'
import Scrollspy from 'react-scrollspy'

import { Link } from 'react-scroll'

const Header = () =>  {

	const [ headerHamburgerClicked, setHeaderHamburgerClicked ] = useState(false);

  	return (

  		<header className={headerHamburgerClicked === true ? "header-main mobile-open" : "header-main"}>
  			<div className="container">
  				<div className="header-main-inner">

					<Scrollspy
						items={ ['introduction', 'mission', 'vision', 'solution', 'conclusion'] }
						currentClassName="active"
						offset={-30}
					>	
						<li id="home">
							<Link activeClass="active" to="introduction" spy={true} smooth={true} duration={300}>Home</Link>
			            	
			            </li>
			            <li>
			            	<Link activeClass="active" to="mission" spy={true} smooth={true} duration={300}>Mission</Link>
			            </li>
			            <li>
			            	<Link activeClass="active" to="vision" spy={true} smooth={true} duration={300}>Vision</Link>
			            </li>
			            <li>
			            	<Link activeClass="active" to="solution" spy={true} smooth={true} duration={300}>The Plan</Link>
			            </li>
			            <li>
			            	<Link activeClass="active" to="conclusion" spy={true} smooth={true} duration={300}>Download Now</Link>
			            </li>
			        </Scrollspy>

			        <a href="https://www.aamc.org/" target="_blank" rel="noreferrer" className="header-main-logo">
	  					<img src="../../images/icon-logo-aamc.png" alt="AAMC Logo" />
	  				</a>
	  				
	  				<div className="header-main-hamburger">
		  				<div 
		  					id="nav-icon"
		  					className={headerHamburgerClicked === true ? "open" : ""}
		  					onClick={ () => {
								setHeaderHamburgerClicked(!headerHamburgerClicked);
								
							}}
							onKeyDown={ () => setHeaderHamburgerClicked(!headerHamburgerClicked) }
							role = "button" 
					        tabIndex="0"
					        aria-label="Open Mobile Menu"
		  				>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>

	  			</div>
	  		</div>
		</header>

  	)
}

export default Header