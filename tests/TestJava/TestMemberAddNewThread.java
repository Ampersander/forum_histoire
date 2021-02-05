package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class TestMemberAddNewThread {
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
  public void testMemberAddNewThread() throws Exception {
    driver.get("http://127.0.0.1:8080/login");
    driver.findElement(By.id("username")).click();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys("test2000");
    driver.findElement(By.id("password")).click();
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys("test2000");
    driver.findElement(By.id("_submit")).click();
    assertEquals("Forum - test2000", driver.findElement(By.xpath("//nav[@id='mainNav']/div/a")).getText());
    driver.findElement(By.linkText("Renaissance")).click();
    driver.findElement(By.linkText("Nouveau sujet")).click();
    driver.findElement(By.id("thread_label")).click();
    driver.findElement(By.id("thread_label")).clear();
    driver.findElement(By.id("thread_label")).sendKeys("Ceci est un test");
    driver.findElement(By.id("thread_sublabel")).click();
    driver.findElement(By.id("thread_sublabel")).clear();
    driver.findElement(By.id("thread_sublabel")).sendKeys("test");
    driver.findElement(By.id("thread_post_0_content")).click();
    driver.findElement(By.id("thread_post_0_content")).clear();
    driver.findElement(By.id("thread_post_0_content")).sendKeys("Ceci est un test");
    driver.findElement(By.id("wf_submit_post_editor")).click();
    assertEquals("Ceci est un test", driver.findElement(By.xpath("//div[@id='wf_forum_content']/div[3]/h1")).getText());
    assertEquals("test2000", driver.findElement(By.linkText("test2000")).getText());
    assertEquals("Votre sujet a été créé", driver.findElement(By.xpath("//div[@id='wf_forum_content']/div/ul/li")).getText());
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
