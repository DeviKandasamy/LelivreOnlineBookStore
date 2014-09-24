<script type="text/javascript">
					$("ul.list-1 li").mouseover(function() {
						$(this).find("a").animate({marginLeft:'5px',color:"#333333"},'fast');
					}).mouseout(function(){
						$(this).find("a").animate({marginLeft:'0px',color:"#ffffff" },'fast');
					});

					$("ul.pro-list li").mouseover(function () {
						$(this).animate({
						backgroundColor: '#FF0000'
						}, 50, function () { });
					});
				</script>
			</body>
		</html>
