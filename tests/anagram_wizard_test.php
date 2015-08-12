<?php
    
    require_once "src/anagram_wizard.php";
    
    class AnagramGeneratorTest extends PHPUnit_Framework_TestCase {
        
        function test_CreateAnagram_oneLetter(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "a";
            $input_list = "a";
        
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
        
            //Assert
            $this->assertEquals("a" , $result);
        }
        
        function test_CreateAnagram_oneLetterFalse(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "a";
            $input_list = "b";
        
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
        
            //Assert
            $this->assertEquals("", $result);
        }
        
        function test_CreateAnagram_multipleSingle(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "a";
            $input_list = "a, b";
            
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
            
            //Assert
            $this->assertEquals("a", $result);
        }
        
        function test_CreateAnagram_WordArrangement(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "he";
            $input_list = "he, ho";
        
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
        
            //Assert
            $this->assertEquals("he", $result);
        }
        
        function test_CreateAnagram_WordRearrange(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "he";
            $input_list = "he, ho, eh";
        
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
        
            //Assert
            $this->assertEquals("he, eh", $result);
        }
        
        function test_CreateAnagram_WordRearrangeNoCase(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "HE";
            $input_list = "hE, ho, eh";
        
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
        
            //Assert
            $this->assertEquals("he, eh", $result);
        }
        
        function test_CreateAnagram_WordRearrangeNoCasePartialMatch(){
            //Arrange
            $test_AnagramGenerator = new Anagram;
            $input_anagram = "them";
            $input_list = "METH, he, met, ho";
        
            //Act
            $result = $test_AnagramGenerator->createAnagram($input_anagram, $input_list);
        
            //Assert
            $this->assertEquals("meth, he, met", $result);
        }
    }
?>