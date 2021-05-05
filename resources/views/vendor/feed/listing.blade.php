

    <listings>
    @foreach($items as $item)
        <listing>
            <Count><![CDATA[{{ $loop->iteration }}]]></Count>
            <Unit_Type> <![CDATA[{{ $item->type  }}]]></Unit_Type>
            <Ad_Type> <![CDATA[{{ $item->ad_type  }}]]></Ad_Type>
            <price> <![CDATA[{{ $item->price  }}]]></price>
  
       

        </listing>    
       @endforeach
   </listings>

