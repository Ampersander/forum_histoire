package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestVisitorSearch {
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
  public void testVisitorSearch() throws Exception {
    driver.get("http://127.0.0.1:8080/forum/");
    driver.findElement(By.linkText("Rechercher")).click();
    driver.findElement(By.id("keywords")).click();
    driver.findElement(By.id("keywords")).clear();
    driver.findElement(By.id("keywords")).sendKeys("nav");
    // ERROR: Caught exception [ERROR: Unsupported command [addSelection | id=forum | label=Renaissance]]
    driver.findElement(By.xpath("//option[@value='1']")).click();
    driver.findElement(By.id("submit")).click();
    assertEquals("Navigateurs", driver.findElement(By.linkText("Navigateurs")).getText());
    driver.findElement(By.linkText("Navigateurs")).click();
    try {
      assertEquals("Au XVIe siècle, le Portugal continue les explorations (Cabral). Les autres grands navigateurs Christophe Colomb, Amerigo Vespucci (voir paragraphe et article détaillé grandes découvertes…) permettent aux puissances ibériques (Portugal et Espagne) d'étendre leur puissance et de chercher de nouvelles voies maritimes pour les épices, la principale route des épices exploitée par les Ottomans étant coupée depuis la chute de Constantinople.", driver.findElement(By.xpath("//div[@id='wf_post[11]']/div[2]/div/p")).getText());
    } catch (Error e) {
      verificationErrors.append(e.toString());
    }
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
