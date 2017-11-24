
<?php
for( $i = 1; $i<50; $i++ ) {

echo "
		<div "; if ( $i % 6 == 0 ) echo ' class="row"'; echo">
		 <div class='col-md-2 dashboard-left-cell'>
             <div class='admin-content-con' align='center'>
			 <img src='index/icon/fold.png' width='45%'>
			  <header>
                 <h5>
                    $name
                 </h5>
               </header>
           </div>
          </div>
		  </div>

";
}
?>



<a href='./$namehref'$favicon class='name'>$name</a>
<a href='./$namehref'>$extn</a></td>
<td sorttable_customkey='$sizekey'><a href='./$namehref'>$size</a></td>
<td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
