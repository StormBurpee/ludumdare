import { h, Component }				from 'preact/preact';
import SVGIcon 						from 'com/svg-icon/icon';
import NavLink 						from 'com/nav-link/link';

export default class HeaderWhatsup extends Component {
	constructor( props ) {
		super(props);
	}

	render( props ) {
		// NOTE: For Theme Voting, look at what's in 'available' returned by the theme list.
		// Then use that to check the name in 'names'. 
		
		// TODO: Write code to convert an array to "1 and 2" or "1, 2, and 3"
		
		// TODO: The actual theme can be found in the the public metatag "event-theme" (private one before event)
		
//		return null;


		return (
			<div class="header-base header-whatsup outside">
				<span class="-title _font2">ON NOW:</span> Ludum Dare 38 <NavLink href="/events/ludum-dare/38/theme"><SVGIcon baseline small gap>suggestion</SVGIcon>Theme Suggestions</NavLink> are open
			</div>
		);

//				<span class="-title _font2">{"Theme:"}</span>{" One room"}

//				<NavLink href="/events/ludum-dare/37/theme"><SVGIcon baseline small gap>mallet</SVGIcon>Theme Voting</NavLink> has ended. The theme will be announced soon.

// Yes, if you're watching the source code, we're going to have to do this manually.
//				<span class="-title _font2">{"Theme:"}</span>{" ???"}

//				<span class="-title _font2">ON NOW:</span> Ludum Dare 37 <NavLink href="/events/ludum-dare/37/theme"><SVGIcon baseline small gap>mallet</SVGIcon>Theme Voting</NavLink> Final Round!

//				<span class="-title _font2">ON NOW:</span> Ludum Dare 37 <NavLink href="/events/ludum-dare/37/theme"><SVGIcon baseline small gap>mallet</SVGIcon>Theme Voting</NavLink> Round 1, Round 2, and Round 3
	}
}
