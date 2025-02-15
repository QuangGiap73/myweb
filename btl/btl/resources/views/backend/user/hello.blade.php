<!DOCTYPE html>
<html>

<head>
    @include('backend.auth.dashboard.component.head')

</head>

<body>
    <div id="wrapper">
    
        @include('backend.auth.dashboard.component.sidebar')

        <div id="page-wrapper" class="gray-bg">
        
        
            @include('backend.auth.dashboard.component.nav')
            
           
            @include('backend.user.hello1')
            

            @include('backend.auth.dashboard.component.footer')
       
        </div>
        
    </div>

    
    @include('backend.auth.dashboard.component.script')
</body>
</html>
