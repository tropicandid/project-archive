import React, { Component } from 'react';
import Tab from "../components/tab"
import JSONData from "../content/solution.json"

class Solution extends Component {

	constructor(props) {
        super(props)
        this.children = [];
        this.handler = this.handler.bind(this);
        this.state = {
            activeTab: 'none'
        };
    }
    handler(id = 'none') {
    	this.setState(
    		{ activeTab: id === 'none' ? 'none' : id, },
    		() => this.loopChildren(this.children)
    	);
    }
    loopChildren(children) {
    	for (var i = children.length - 1; i >= 0; i--) {
    		this.children[i].toggle(this.state.activeTab)
    	}
    }
	render() {
		return (

			<section id="solution" className="page-section solution">

				<div className="container">

					<div className="solution-headline">

						<h2 className="center white" dangerouslySetInnerHTML={{ __html:JSONData.title }}></h2>

						<p className="white center">{JSONData.description}</p>

					</div>

					<div className="accordion-wrapper">

						{JSONData.content.map((data, index) => {
							

					    	return (

					    		<Tab 
					    			onRef={ref => (this.children[index] = ref)}
					    			tabindex={index} 
					    			key={index} 
					    			tabtitle={data.accordionTitle} 
					    			tabsubtitle={data.accordionSubTitle} 
					    			tabcontent={data.accordionCopy} 
					    			tabimage={data.accordionImage}
					    			action={this.handler}
					    			parentstate={this.state.activeTab}/>

					    	)

					    })}
				        
					</div>

				</div>

			</section>
		)
	}
}

export default Solution