package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestMemberSearch {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "https://www.google.com/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testMemberSearch() throws Exception {
    driver.get("http://127.0.0.1:8080/login");
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("test2000");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("test2000");
    driver.findElement(By.id("_submit")).click();
    driver.findElement(By.linkText("Rechercher")).click();
    driver.findElement(By.id("keywords")).click();
    driver.findElement(By.id("keywords")).clear();
    driver.findElement(By.id("keywords")).sendKeys("test");
    // ERROR: Caught exception [ERROR: Unsupported command [addSelection | id=forum | label=Renaissance]]
    driver.findElement(By.xpath("//option[@value='1']")).click();
    driver.findElement(By.id("submit")).click();
    assertEquals("Résultats pour \"test\"", driver.findElement(By.xpath("//div[@id='wf_forum']/div/h1")).getText());
    assertEquals("dggfddgssgd", driver.findElement(By.linkText("dggfddgssgd")).getText());
    assertEquals("Navigateurs", driver.findElement(By.linkText("Navigateurs")).getText());
    assertEquals("Ceci est un test", driver.findElement(By.linkText("Ceci est un test")).getText());
    assertEquals("Ceci est un test", driver.findElement(By.xpath("(//a[contains(text(),'Ceci est un test')])[2]")).getText());
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
