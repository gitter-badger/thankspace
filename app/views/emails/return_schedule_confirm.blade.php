
{{--*/ $fullname = ucfirst($firstname) .' '. ucfirst($lastname) /*--}}

@if( $type == 'driver' )
	{{--*/ $utype = 'Delivery Team' /*--}}
@elseif( $type == 'user' )
	{{--*/ $utype = 'Customer' /*--}}
@else
	{{--*/ $utype = 'Admin' /*--}}
@endif

@include('emails.header')

	<tr>
		<td style="background-color:#ffffff;border-top:0px none;border-bottom:0px none;font-family:Arial;font-weight:normal;text-align:left">

			<div align="left" valign="top" style="font-size:13px;line-height:1.4em;color:#444">

				<p>
					Hello, {{ $return['order']['user']['firstname'] }}
				</p>

				<p>
					{{ Input::get('message') }}
				</p>
					
				<p>Salam,</p>
				<p>Happy Customer Service Officer, ThankSpace</p><br>
				<img src="http://thankspace.com/assets/img/tour-1.png" width="85px">
			</div>

		</td>
	</tr>

@include('emails.footer')