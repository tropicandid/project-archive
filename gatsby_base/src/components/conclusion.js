import React from "react"

import JSONData from "../content/conclusion.json"

const Conclusion = () => {

	return (

		<section id="conclusion" className="page-section alt conclusion">
			<div className="container">
				<h2>{JSONData.header}</h2>
				<a className="btn" href={JSONData.ctaFileUrl} target="_blank" rel="noreferrer">{JSONData.ctaTitle}</a>
			</div>
		</section>

	)

}

export default Conclusion