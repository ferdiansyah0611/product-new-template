"use strict";
class custom{
	var Messages = 'Your Problem : ';
	function custom_template(body_background_color, Messages){
		const body_background_color = body.getElementById("body_background_color");
		const body_background_image = body.getElementById("body_background_image");
		const body_background_attach = body.getElementById("body_background_attach");
		const body_background_font_size = body.getElementById("body_background_font_size");
		const body_background_font_color = body.getElementById("body_background_font_color");
		try {
			for(i = 0; i < body_background_color.length; i++){
				body_background_color[i].style.backgroundColor = 'black';
				body_background_color.InnerHTML = Messages;
			}
		} catch(e) {
			console.log(e);
		}//catch
	}//function
	$app = New custom_template();
	$app->addEventListener(type: DOMString, callback: EventListener, capture?: boolean);
}//class