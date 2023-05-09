<style>
    /*
    .footer {
        
        position:fixed;
        bottom: 0;
        width: 100%;
        background-color: #e1eef7;;
        color: #041769;
        text-align: center;
        table-layout: fixed;
        clear: both;
        
        position:fixed;
        width: 1050px;
	    margin: 0 auto;
        bottom: 0;
        
    }
    */
</style>
<?php
session_start();

if (isset($_SESSION['user']))
    require_once("navbar_signed_in.php");
else 
    require_once("navbar_signed_out.php");

// Footer
/*
function template_footer()
{
    $year = date('Y');
    echo <<< FOOTER
            <footer>
                <div class="footer">
                    <!-- <p>&copy; $year, Alfa Omega Cars Copyright ©</p> -->
                </div>
            </footer>
            <script src="script.js"></script>
        </body>
    </html>
    FOOTER;
}*/
?>
</body>
</html>