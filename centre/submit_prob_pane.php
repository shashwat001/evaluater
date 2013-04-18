 <form name="formprob" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" onsubmit="return validate();">
	<table>
		<tr>
			<td>Code</td>
			<td><input type="text" id="code" name="code" value=""></td>
		</tr>
                <tr>
			<td>Category</td>
                        <td>
                            <select name="category">
                                <option value="0">Easy</option>
                                <option value="1">Medium</option>
                                <option value="2">Difficult</option>
                            </select>
                        </td>
		</tr>
                <tr>
			<td>Name</td>
			<td><input type="text" name="name" value=""></td>
		</tr>
		<tr>
			<td>Problem</td>
                        <td><input type="file" name="probfile" /></td>
		</tr>
                <tr>
			<td>Time Limit</td>
                        <td><input type="number" name="tlimit" ></td>
		</tr>
                <tr>
			<td>Memory Limit</td>
                        <td><input type="number" name="memlimit" ></td>
		</tr>
                <tr>
                        <td>Test Cases</td>
                        <td><button id="add" name="add" onclick="return addtcase(this);" >Add</button></td>
                </tr>
                <tr>
                        <td></td>
                        <td id="tcasebox">
                        </td>
                </tr>
                <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="submit"></td>
                </tr>
	</table>
     <input type="hidden" id="hidden" name="hidden" value="" />
</form>