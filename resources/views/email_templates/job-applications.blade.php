@php
$settings = \App\Models\GeneralSetting::find(1);
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<html lang="en">

<head></head>


<body style="background-color:#f3f3f5;font-family:HelveticaNeue,Helvetica,Arial,sans-serif">
	<table align="center" role="presentation" cellSpacing="0" cellPadding="0" border="0" width="100%" style="max-width:680px;width:100%;margin:0 auto;background-color:#ffffff">
		<tr style="width:100%">
			<td>
				<table style="display:flex;background:#f3f3f5;padding:20px 30px" align="center" border="0" cellPadding="0" cellSpacing="0" role="presentation" width="100%">
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
				<table width="100%" style="border-radius:5px 5px 0 0;display:flex;flex-direciont:column;background-color:#2b2d6e" align="center" role="presentation" cellSpacing="0" cellPadding="0" border="0">
					<tbody style="width:100%">
						<tr style="width:100%">
							<td style="padding:20px 30px 15px">
								<h1 style="color:#fff;font-size:27px;font-weight:bold;line-height:27px">New Job Application</h1>
								<p style="font-size:17px;line-height:24px;margin:16px 0;color:#fff">


								</p>
							</td>
							<td style="padding:30px 10px"></td>
						</tr>
					</tbody>
				</table>
				<table style="padding:30px 30px 40px 30px" align="center" border="0" cellPadding="0" cellSpacing="0" role="presentation" width="100%">
					<tbody>
						<tr>
							<td>
								<h2 style="margin:0 0 15px;font-weight:bold;font-size:21px;line-height:21px;color:#0c0d0e"></h2>
								<p style="font-size:15px;line-height:21px;margin:16px 0;color:#3c3f44">
								     {{-- Full Name: {{$application->full_name}}<br><br>
								    Email: {{$application->email}}<br><br>
								    Driving License: {{$application->driving_license}}<br><br>
								    Car: {{$application->car}}<br><br>
								    Experience in Dubai: {{$application->experience_in_dubai}}<br><br>
								    Visa Type: {{$application->visa_status}}<br><br>
								    Visa Validity: {{$application->visa_validity}}<br><br>
								    Nationality: {{$application->nationality}}<br><br> --}}
								</p>
								<hr style="width:100%;border:none;border-top:1px solid #eaeaea;margin:30px 0" />

								<p style="font-size:15px;line-height:21px;margin:16px 0;color:#3c3f44">Feel free to contact us directly if you have any queries or suggestions by simply replying to this email.</p>
								<hr style="width:100%;border:none;border-top:1px solid #eaeaea;margin:30px 0" />
								<h2 style="margin:0 0 15px;font-weight:bold;font-size:21px;line-height:21px;color:#0c0d0e">Thank you for choosing our company.</h2>

							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>

</body>

</html>
