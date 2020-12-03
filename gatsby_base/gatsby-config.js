/**
 * Configure your Gatsby site with this file.
 *
 * See: https://www.gatsbyjs.org/docs/gatsby-config/
 */

module.exports = {
	plugins: [
	    `gatsby-plugin-react-helmet`,
	    {
	    	resolve: 'gatsby-plugin-html-attributes',
	      	options: {
	    		lang: 'en'
	    	}
	    },
	    'gatsby-plugin-sass',
	    'gatsby-disable-404',
	    {
		    resolve: `gatsby-plugin-netlify-headers`,
		    options: {
		      	headers: {
		      		"/*": [
				        "Access-Control-Allow-Origin: *"
				    ],
		      	},                                  // option to add more headers. `Link` headers are transformed by the below criteria
		      	allPageHeaders: [],                           // option to add headers for all pages. `Link` headers are transformed by the below criteria
		      	mergeSecurityHeaders: true,                   // boolean to turn off the default security headers
		      	mergeLinkHeaders: false,                      // boolean to turn off the default gatsby js headers (disabled by default, until gzip is fixed for server push)
		      	mergeCachingHeaders: true,                    // boolean to turn off the default caching headers
		      	transformHeaders: (headers, path) => headers, // optional transform for manipulating headers under each path (e.g.sorting), etc.
		    }
		}
  	],
	siteMetadata: {
	    title: 'AAMC Strategic Plan'
	}
}
