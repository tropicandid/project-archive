import React, { Component } from 'react';
import AnimateHeight from 'react-animate-height';

class Tab extends Component {
	constructor(props) {
		super(props);
		this.handleClick = this.handleClick.bind(this);
		this.state = {
	        visib : false,
	        height: 0,
	        accordionState: 'closed'
	    }
	}
	componentDidMount() {
	    this.props.onRef(this);
	}
	componentWillUnmount() {
	    this.props.onRef(undefined)
	}
	scrollToTop() {

	}
	handleClick() {
		this.props.action(this.props.tabindex);

		const id = "solution-accordion-"+this.props.tabindex,
		 	  yOffset = -85,
		 	  element = document.getElementById(id);

		setTimeout(function(){
			const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
			window.scrollTo({top: y, behavior: 'smooth'});
		}, 500);

	}
	toggle(id) {
		if( this.props.tabindex === id ){
    		this.setState({ height: this.state.height === 0 ? 'auto' : 0, });
			this.setState({ accordionState: this.state.accordionState === 'closed' ? 'open' : 'closed', });
		}else {
    		this.setState({ height: 0 });
    		this.setState({ accordionState: 'closed' });
    	}
    }
	render() {
		return (
			<section id={ `solution-accordion-${this.props.tabindex}` } className="solution-accordion" onClick={this.handleClick} onKeyDown={this.handleClick}>

				<span className="accordion-index">No. {this.props.tabindex + 1}</span>

				<div className={ `solution-accordion__headline ${this.state.accordionState}` }>

		    		<h3 className="tab-header">{this.props.tabtitle}</h3>

		    		<p className="tab-description">{this.props.tabsubtitle}</p>

		    	</div>

		    	<div id={ `solution-accordion__content-${this.props.tabindex}` } className={ `accordion-content ${this.state.visib ? 'show' : 'hide'}` }>

		    		<AnimateHeight
		    		className={ `accordion-content ${this.state.visib ? 'show' : 'hide'}` }
				  	duration={ 500 }
				  	height={ this.state.height }
				  	>

						<div className="accordion-content__wrapper">

							<div dangerouslySetInnerHTML={{ __html: this.props.tabcontent }} ></div>

							<div>
								<img src={this.props.tabimage } alt="" />
							</div>

						</div>

					</AnimateHeight>

		    	</div>

			</section>
		)
	}
}

export default Tab