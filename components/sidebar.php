<?php
$fileName = basename($_SERVER['PHP_SELF']);
$color1 = 'bg-white';
$color2 = 'bg-white';
$textColor1 = 'text-white';
$textColor2 = 'text-white';
if ($fileName == 'index.php') {
    $color1 = 'bg-[#2363DE]';
    $color2 = 'bg-white hover:bg-gray-100';
    $textColor1 = 'text-white';
    $textColor2 = 'text-gray-900';
    } else {
    $color2 = 'bg-[#2363DE]';
    $color1 = 'bg-white hover:bg-gray-100';
    $textColor2 = 'text-white';
    $textColor1 = 'text-gray-900';
}
?>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-dark10 border-2" aria-label="Sidebar">
    <div class="h-full px-6 py-4 overflow-y-auto bg-white">
        <a class="flex items-center justify-center cursor-pointer my-12" href="#">
            <div class="self-center align-middle text-xl font-semibold">E-Learning</div>
        </a>
        <div class="text-dark30 text-sm mb-6">Admin Panel</div>
        <ul class="space-y-5 font-medium">
            <li>
                <a href="index.php" class="flex items-center py-3 px-6 <?php echo $color1.' '.$textColor1 ?> rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V17.7152V20.7732C14.8563 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="white" class="fill-current <?php echo 'text'.$color1 ?>" />
                    </svg>
                    <span class="ml-6 font-semibold <?php echo 'text-'.$textColor1 ?>">Students</span>
                </a>
            </li>
            <li>
                <a href="admin.php" class="flex items-center py-3 px-6 <?php echo $color2.' '.$textColor2 ?> rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V17.7152V20.7732C14.8563 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="white" class="fill-current <?php echo 'text'.$color2 ?>" />
                    </svg>
                    <span class="ml-6 font-semibold <?php echo 'text-'.$textColor2 ?>">Admins</span>
                </a>
            </li>
        </ul>
        <div class="text-dark30 text-sm my-6">Other</div>
        <ul class="space-y-5 font-medium">
            <li>
                <form action="controller/authentication/logout.php" method="POST">
                    <button type="submit" class="flex w-full items-center p-2 py-3 px-6 text-gray-900 rounded-lg hover:bg-gray-100">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.89535 11.23C9.45785 11.23 9.11192 11.57 9.11192 12C9.11192 12.42 9.45785 12.77 9.89535 12.77H16V17.55C16 20 13.9753 22 11.4724 22H6.51744C4.02471 22 2 20.01 2 17.56V6.45C2 3.99 4.03488 2 6.52762 2H11.4927C13.9753 2 16 3.99 16 6.44V11.23H9.89535ZM19.6302 8.5402L22.5502 11.4502C22.7002 11.6002 22.7802 11.7902 22.7802 12.0002C22.7802 12.2002 22.7002 12.4002 22.5502 12.5402L19.6302 15.4502C19.4802 15.6002 19.2802 15.6802 19.0902 15.6802C18.8902 15.6802 18.6902 15.6002 18.5402 15.4502C18.2402 15.1502 18.2402 14.6602 18.5402 14.3602L20.1402 12.7702H16.0002V11.2302H20.1402L18.5402 9.6402C18.2402 9.3402 18.2402 8.8502 18.5402 8.5502C18.8402 8.2402 19.3302 8.2402 19.6302 8.5402Z" fill="#F1582F" />
                        </svg>
                        <span class="ml-6 font-semibold text-[#F1582F]">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
</div>