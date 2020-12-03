import React from "react"
import Helmet from "react-helmet"

import Header from "../components/header"
import Introduction from "../components/introduction"
import Mission from "../components/mission"
import Vision from "../components/vision"
import Solution from "../components/solution"
import Conclusion from "../components/conclusion"
import Footer from "../components/footer"

import '../assets/styles/style.scss';

class Home extends React.Component {
	render() {
    	return (
    		<div>
	    		<Helmet>
	    			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    			<title>AAMC Strategic Plan</title>
	    			<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	    			 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,600;0,700;0,900;1,300&display=swap" />
	    			<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=eryih7hpm0aldh5kfcpk4g" async="true"></script>
	    		</Helmet>
				<div className="page-wrapper">
					<Header />
					<Introduction />
					<Mission />
					<Vision />
					<Solution />
					<Conclusion />
					<Footer />
				</div>
			</div>
		)
    }
}

export default Home