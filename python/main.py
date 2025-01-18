from moviepy.editor import VideoFileClip

# Load the video file
video = VideoFileClip("sining.mp4")
# need to install pip install moviepy
# Extract audio and save as MP3
video.audio.write_audiofile("sining.mp3")
