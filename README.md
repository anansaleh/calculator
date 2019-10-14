# problem Calculator
This some code to calculate a result from a set of instructions. Instructions comprise of an initial number, followed by keyword and a number that are separated by new lines. Instructions are loaded from file and results are output to the screen. Any number of Instructions can be specified. Instructions can be any binary operators (e.g., add, divide, subtract, multiply etc).  The instructions will ignore mathematical precedence. The calculator is then initialised with that first number and the subsequent instructions are applied to that number. The command line application should be able to accept one or more files and output results of those file to screen.
## Execute command
you need to run the following command
```$xslt
    php calculator.php [input_file_name1] [input_file_name2] [input_file_name3] .....
    
    php calculator.php input02.txt input01.txt input03.txt
```
## Examples of the calculator lifecycle might be:
### Example 1
>>>>
```$xslt
    [Input from file]    
    2    
    add 3    
    multiply 3    
    [Output to screen]    
    15
    [Explanation]
    
    (3 + 2) * 3 = 15
```
### Example 2
>>>>
```$xslt
    [Input from file]    
    9    
    multiply 5    
    [Output to screen]    
    45
    [Explanation]
    
    5 * 9 = 45
```
### Example 3
```$xslt
    [Input from file]    
    1    
    [Output to screen]    
    1
```

## Proposal
- The first line must contain only number
- All other lines contain operator + space + number
- Operators are only ( add, divide, subtract, multiply) 

## Implement / algorithm
### main script
The main script check the list files names which given as argument in the command and for each file call the calculator function
if ther is no argument then print error

### Calculator function calcInputFile($file_name)

The main function is __calcInputFile__ which get one parameter file_name as argument and try calculate:
1. First it check if file is not empty. if is then stop calculate write error in the log file
2. Check the first line has only number. if not stop the calculate and write error in the log file
3. for each others lines is they have operator + space + number. if not stop the calculate , write error in the log file, and continue with the next line 
4. Check the operator if it in ( add, divide, subtract, multiply).

